// npm install gulp-postcss autoprefixer gulp-rename cssnano gulp-sourcemaps gulp browser-sync gulp-sass sass gulp-imagemin gulp-webp gulp-newer --save-dev
// npm install --save-dev gulp-connect-php

import gulp from 'gulp';
const { series, src, dest, task, watch } = gulp;

import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);

import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import sourcemaps from 'gulp-sourcemaps';

import newer from 'gulp-newer';
import imagemin, { mozjpeg, optipng, svgo } from 'gulp-imagemin';
import imagewebp from 'gulp-webp';
import browserSync from 'browser-sync';

const paths = {
  scss: {
    src: "front/template/default/assets/css/*.scss",
    dest: "front/template/default/assets/css",
    srcSCSS: "front/template/default/assets/scss/**/*.scss",
  },
  img: {
    src: "front/template/default/assets/img-origin/**/*.{jpg,png,svg}",
    dest: "front/template/default/assets/img"
  },
  imgWebp: {
    src: "front/template/default/assets/img-origin/**/*.{jpg,png}",
  }
}

function compileSass() {
  return src(paths.scss.src)
    .pipe(newer(paths.scss.srcSCSS))
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }))
    .on("error", sass.logError)
    .pipe(postcss([autoprefixer(), cssnano]))
    .pipe(sourcemaps.write())
    .pipe(dest(paths.scss.dest))
    .pipe(browserSync.stream());
}

// Optimize Images
function optimizeImage() {
  return src(paths.img.src)
    // Only pass through newer images
    .pipe(newer(paths.img.dest))
    .pipe(imagemin([
      mozjpeg({ quality: 90, progressive: true }),
      optipng({ optimizationLevel: 6 }),
      svgo({
        plugins: [
          {
            name: 'removeViewBox',
            active: true
          },
          {
            name: 'cleanupIDs',
            active: true
          }
        ]
      })
    ]))
    .pipe(dest(paths.img.dest));
}

// WEBP Images
function webpImage() {
  return src(paths.imgWebp.src)
    // Only pass through newer images
    .pipe(newer(paths.img.dest))
    .pipe(imagewebp({ quality: 100 }))
    .pipe(dest(paths.img.dest));
}

function watchTask() {
  watch(paths.scss.src, compileSass);
  watch(paths.scss.srcSCSS, compileSass);
  watch(paths.img.src, optimizeImage);
  watch(paths.imgWebp.src, webpImage);
}

// default gulp
export default series(
  compileSass,
  optimizeImage,
  webpImage,
  watchTask
)