module.exports = {
    apps:[{
        name: 'dmsc-service-api',
        script: 'app.js',

        instances: 1,
        autorestart: true,
        watch: true,
        max_memory_restart: '1G',
        env: {
            PORT: 3500,
            NODE_ENV: 'development'
        },env_production: {
            PORT: 3500,
            NODE_ENV: 'production'
        }
    }]
}