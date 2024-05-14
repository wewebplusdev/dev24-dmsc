<section class="layout-body">
    <div class="default-header">
        <div class="wrapper">
            <div class="container">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{$ul}/home" class="link">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.856" height="15.857"
                                        viewBox="0 0 15.856 15.857">
                                        <path id="home-3"
                                            d="M15.43,6.9h0L8.96.428A1.459,1.459,0,0,0,6.9.428L.43,6.893.424,6.9A1.459,1.459,0,0,0,1.4,9.386l.045,0H1.7v4.76a1.71,1.71,0,0,0,1.709,1.708H5.937a.465.465,0,0,0,.465-.465V11.661a.78.78,0,0,1,.779-.779H8.674a.78.78,0,0,1,.779.779v3.732a.465.465,0,0,0,.465.465h2.531a1.71,1.71,0,0,0,1.709-1.708V9.389H14.4A1.46,1.46,0,0,0,15.43,6.9Zm0,0"
                                            transform="translate(0)" fill="#fff" />
                                    </svg>
                                </span>
                                {$languageFrontWeb->homepage->display->$currentLangWeb}
                            </a>
                        </li>
                        <li>
                            <a href="{$ul}/{$menuActive}/{$masterkey}" class="link">
                                {$language_modules.breadcrumb1}
                            </a>
                        </li>
                    </ol>
                </div>
                <h1 class="title">
                    {$language_modules.breadcrumb1}
                </h1>
                <div class="graphic">
                    <div class="obj">
                        <img src="{$template}/assets/img/uploads/inner5.png" alt="obj-banner-about"
                            class="lazy img-cover">
                    </div>
                </div>
            </div>
        </div>
        <figure class="cover">
            <img src="{$template}/assets/img/static/banner.jpg" alt="" class="lazy img-cover">
        </figure>
    </div>

    {include file="front/controller/script/contact/template/footer-contact.tpl"}

    <div class="default-body pt-lg-3 pt-0 info-form" data-step="{$languageFrontWeb->step->display->$currentLangWeb}" data-step1="{$languageFrontWeb->fraudcomplaint->display->$currentLangWeb}" data-step2="{$languageFrontWeb->complaintdetails->display->$currentLangWeb}" data-step3="{$languageFrontWeb->savedata->display->$currentLangWeb}">
        <div class="container">
            <div class="layout-form-progress">
                <div class="container">
                    <div class="whead">
                        <h2 class="title">
                            {$languageFrontWeb->complaintsofcorruption->display->$currentLangWeb}
                        </h2>
                    </div>
                    <div class="form-progress-step">
                        <ul class="nav">
                            <li class="item active current-progress progress-step1">
                                <div class="circle">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.309" height="35"
                                            viewBox="0 0 31.309 35">
                                            <path id="form"
                                                d="M9.98,33.633A1.367,1.367,0,0,1,8.613,35H5.469A5.475,5.475,0,0,1,0,29.531V5.469A5.475,5.475,0,0,1,5.469,0H22.278a5.475,5.475,0,0,1,5.469,5.469V13.6a1.367,1.367,0,0,1-2.734,0V5.469a2.738,2.738,0,0,0-2.734-2.734H5.469A2.738,2.738,0,0,0,2.734,5.469V29.531a2.738,2.738,0,0,0,2.734,2.734H8.613A1.367,1.367,0,0,1,9.98,33.633ZM22.277,9.57A1.367,1.367,0,0,0,20.91,8.2H6.828a1.367,1.367,0,0,0,0,2.734H20.91A1.367,1.367,0,0,0,22.277,9.57Zm-5.461,5.469a1.367,1.367,0,0,0-1.367-1.367H6.828a1.367,1.367,0,0,0,0,2.734h8.621A1.367,1.367,0,0,0,16.816,15.039Zm-9.988,4.1a1.367,1.367,0,0,0,0,2.734H12.51a1.367,1.367,0,0,0,0-2.734ZM30.68,33.983A2.737,2.737,0,0,1,28.55,35H15.2a2.763,2.763,0,0,1-2.7-3.332,9.587,9.587,0,0,1,5.373-6.756,5.332,5.332,0,1,1,8,0,9.527,9.527,0,0,1,2.08,1.3,9.635,9.635,0,0,1,3.266,5.324c.011.036.02.072.028.109A2.786,2.786,0,0,1,30.68,33.983Zm-11.4-12.589a2.6,2.6,0,1,0,2.6-2.6A2.6,2.6,0,0,0,19.277,21.394Zm9.3,10.833v0a6.839,6.839,0,0,0-13.4,0,.035.035,0,0,0,.015.041H28.55A.065.065,0,0,0,28.573,32.227Zm0,0"
                                                fill="#c9c9c9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-step">{$languageFrontWeb->step->display->$currentLangWeb} 1</div>
                                <div class="desc">{$languageFrontWeb->fraudcomplaint->display->$currentLangWeb}</div>
                            </li>
                            <li class="item current-progress progress-step2">
                                <div class="circle">
                                    <div class="icon">
                                        <svg id="writing" xmlns="http://www.w3.org/2000/svg" width="31.367" height="35"
                                            viewBox="0 0 31.367 35">
                                            <g id="Group_90939" data-name="Group 90939">
                                                <g id="Group_90938" data-name="Group 90938">
                                                    <path id="Path_452712" data-name="Path 452712"
                                                        d="M25.134,16.992a1.367,1.367,0,0,0-1.367-1.367H9.684a1.367,1.367,0,0,0,0,2.734H23.766A1.367,1.367,0,0,0,25.134,16.992Z"
                                                        transform="translate(-2.856 -1.953)" fill="#c9c9c9" />
                                                    <path id="Path_452713" data-name="Path 452713"
                                                        d="M9.684,21.875a1.367,1.367,0,0,0,0,2.734h8.553a1.367,1.367,0,0,0,0-2.734Z"
                                                        transform="translate(-2.856 -2.734)" fill="#c9c9c9" />
                                                    <path id="Path_452714" data-name="Path 452714"
                                                        d="M12.117,32.266H7.545A2.737,2.737,0,0,1,4.81,29.531V5.469A2.737,2.737,0,0,1,7.545,2.734H24.353a2.737,2.737,0,0,1,2.734,2.734v8.408a1.367,1.367,0,0,0,2.734,0V5.469A5.475,5.475,0,0,0,24.353,0H7.545A5.475,5.475,0,0,0,2.076,5.469V29.531A5.475,5.475,0,0,0,7.545,35h4.572a1.367,1.367,0,1,0,0-2.734Z"
                                                        transform="translate(-2.076)" fill="#c9c9c9" />
                                                    <path id="Path_452715" data-name="Path 452715"
                                                        d="M34.362,22.451a4.106,4.106,0,0,0-5.8,0L21.056,29.94a1.368,1.368,0,0,0-.342.57l-1.635,5.382a1.367,1.367,0,0,0,1.673,1.715l5.518-1.529a1.367,1.367,0,0,0,.6-.35l7.49-7.476A4.106,4.106,0,0,0,34.362,22.451ZM25.194,33.539l-2.776.769.812-2.675L28.3,26.58l1.934,1.934Zm7.235-7.221-.265.264-1.934-1.934.264-.263a1.367,1.367,0,0,1,1.934,1.933Z"
                                                        transform="translate(-4.194 -2.656)" fill="#c9c9c9" />
                                                    <path id="Path_452716" data-name="Path 452716"
                                                        d="M23.766,9.375H9.684a1.367,1.367,0,0,0,0,2.734H23.766a1.367,1.367,0,0,0,0-2.734Z"
                                                        transform="translate(-2.856 -1.172)" fill="#c9c9c9" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-step">{$languageFrontWeb->step->display->$currentLangWeb} 2</div>
                                <div class="desc">{$languageFrontWeb->complaintdetails->display->$currentLangWeb}</div>
                            </li>
                            <li class="item current-progress progress-step3">
                                <div class="circle">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32.707" height="35"
                                            viewBox="0 0 32.707 35">
                                            <g id="save-2" transform="translate(-1.147)">
                                                <path id="Path_452747" data-name="Path 452747"
                                                    d="M20.083,24.349H14.917a1.367,1.367,0,0,0,0,2.734h5.166a1.367,1.367,0,0,0,0-2.734Z"
                                                    fill="#c9c9c9" />
                                                <path id="Path_452748" data-name="Path 452748"
                                                    d="M32.486,24.091a1.367,1.367,0,0,0,1.367-1.367V9.545a5.408,5.408,0,0,0-1.567-3.82l-4.05-4.106A5.469,5.469,0,0,0,24.367,0H6.583A5.443,5.443,0,0,0,1.147,5.439V29.561A5.443,5.443,0,0,0,6.583,35H28.417a5.444,5.444,0,0,0,5.436-5.44,1.367,1.367,0,0,0-2.734,0,2.706,2.706,0,0,1-2.7,2.7H27.365v-11.1a4.739,4.739,0,0,0-4.733-4.733H12.368a4.739,4.739,0,0,0-4.733,4.733v11.1H6.583a2.706,2.706,0,0,1-2.7-2.7V5.439a2.706,2.706,0,0,1,2.7-2.7h1.73V6.957a4.739,4.739,0,0,0,4.732,4.735h8.91a4.739,4.739,0,0,0,4.732-4.735V3.942l3.652,3.7a2.689,2.689,0,0,1,.779,1.9V22.724a1.367,1.367,0,0,0,1.367,1.367ZM10.369,21.166a2,2,0,0,1,2-2H22.632a2,2,0,0,1,2,2v11.1H10.369ZM21.955,8.957h-8.91a2,2,0,0,1-2-2V2.734h3.306V4.153a1.367,1.367,0,1,0,2.734,0V2.734h6.866V6.957a2,2,0,0,1-2,2Z"
                                                    fill="#c9c9c9" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-step">{$languageFrontWeb->step->display->$currentLangWeb} 3</div>
                                <div class="desc">{$languageFrontWeb->savedata->display->$currentLangWeb}</div>
                            </li>
                        </ul>
                        <div class="progress-line"></div>
                    </div>
                </div>
            </div>
            <div class="layout-form">
                <form action="" class="form-default form-contact" id="form-contact">
                    <div class="form-head">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31.309" height="35"
                                        viewBox="0 0 31.309 35">
                                        <path id="form"
                                            d="M9.98,33.633A1.367,1.367,0,0,1,8.613,35H5.469A5.475,5.475,0,0,1,0,29.531V5.469A5.475,5.475,0,0,1,5.469,0H22.278a5.475,5.475,0,0,1,5.469,5.469V13.6a1.367,1.367,0,0,1-2.734,0V5.469a2.738,2.738,0,0,0-2.734-2.734H5.469A2.738,2.738,0,0,0,2.734,5.469V29.531a2.738,2.738,0,0,0,2.734,2.734H8.613A1.367,1.367,0,0,1,9.98,33.633ZM22.277,9.57A1.367,1.367,0,0,0,20.91,8.2H6.828a1.367,1.367,0,0,0,0,2.734H20.91A1.367,1.367,0,0,0,22.277,9.57Zm-5.461,5.469a1.367,1.367,0,0,0-1.367-1.367H6.828a1.367,1.367,0,0,0,0,2.734h8.621A1.367,1.367,0,0,0,16.816,15.039Zm-9.988,4.1a1.367,1.367,0,0,0,0,2.734H12.51a1.367,1.367,0,0,0,0-2.734ZM30.68,33.983A2.737,2.737,0,0,1,28.55,35H15.2a2.763,2.763,0,0,1-2.7-3.332,9.587,9.587,0,0,1,5.373-6.756,5.332,5.332,0,1,1,8,0,9.527,9.527,0,0,1,2.08,1.3,9.635,9.635,0,0,1,3.266,5.324c.011.036.02.072.028.109A2.786,2.786,0,0,1,30.68,33.983Zm-11.4-12.589a2.6,2.6,0,1,0,2.6-2.6A2.6,2.6,0,0,0,19.277,21.394Zm9.3,10.833v0a6.839,6.839,0,0,0-13.4,0,.035.035,0,0,0,.015.041H28.55A.065.065,0,0,0,28.573,32.227Zm0,0"
                                            fill="#fff" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="title title-form">{$languageFrontWeb->step->display->$currentLangWeb} : 1 {$languageFrontWeb->fraudcomplaint->display->$currentLangWeb}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        {* Start Step 1 *}
                        <div class="-form-step1">
                            <div class="form-group">
                                <label for="inputTopic" class="control-label">{$languageFrontWeb->contact_subject->display->$currentLangWeb}<span>*</span></label>
                                <input type="text" id="inputTopic" value="" name="inputTopic" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDesc" class="control-label">{$languageFrontWeb->contact_detail->display->$currentLangWeb}<span>*</span></label>
                                <textarea id="inputDesc" name="inputDesc" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}"
                                    class="form-control form-textarea" required></textarea>
                            </div>
                            <div class="row gutters-40">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">{$languageFrontWeb->contact_name->display->$currentLangWeb}<span>*</span></label>
                                        <input type="text" id="inputName" value="" name="inputName"
                                            placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="inputAddress" class="control-label">{$languageFrontWeb->contact_address->display->$currentLangWeb}<span>*</span></label>
                                        <input type="text" id="inputAddress" value="" name="inputAddress" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters-40">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="inputTel" class="control-label">{$languageFrontWeb->contact_tel->display->$currentLangWeb}<span>*</span></label>
                                        <input type="text" id="inputTel" value="" name="inputTel" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">{$languageFrontWeb->contact_email->display->$currentLangWeb}<span>*</span></label>
                                        <input type="text" id="inputEmail" value="" name="inputEmail" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="validate_step('step1');">{$languageFrontWeb->contact_next->display->$currentLangWeb}</a>
                                <a href="javascript:void(0);" onclick="reload_form();" class="btn btn-primary btn-cancel">{$languageFrontWeb->contact_cancel->display->$currentLangWeb}</a>
                            </div>
                        </div>
                        {* End Step 1 *}

                        {* Start Step 2 *}
                        <div class="-form-step2" style="display: none;">
                            <div class="row gutters-40">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label for="inputComplaintName" class="control-label">{$languageFrontWeb->recommend_name->display->$currentLangWeb}<span>*</span> <span class="text-placeholder">{$languageFrontWeb->recommend_name_note->display->$currentLangWeb}</span></label>
                                    <input type="text" id="inputComplaintName" value="" name="inputComplaintName" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                    <label for="inputComplaintTime" class="control-label">{$languageFrontWeb->recommend_rank->display->$currentLangWeb}<span>*</span> <span class="text-placeholder">{$languageFrontWeb->recommend_rank_note->display->$currentLangWeb}</span></label>
                                    <input type="text" id="inputComplaintTime" value="" name="inputComplaintTime" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}" class="form-control" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label mb-md-3 mb-2">
                                {$languageFrontWeb->recommend_fac->display->$currentLangWeb} <span>*</span>
                                </label>
                                <div class="block-control mb-md-3 mb-2">
                                    <div class="radio-control">
                                    <input type="radio" id="inputComplaintFac1" value="1" name="inputComplaintFac" class="form-control" checked>
                                    <div class="icon"></div>
                                    <div class="title">{$languageFrontWeb->recommend_fac_etc1->display->$currentLangWeb}</div>
                                    </div>
                                </div>
                                <div class="block-control">
                                    <div class="radio-control">
                                    <input type="radio" id="inputComplaintFac2" value="2" name="inputComplaintFac" class="form-control">
                                    <div class="icon"></div>
                                    <div class="title">{$languageFrontWeb->recommend_fac_etc2->display->$currentLangWeb}</div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="inputComplaintDesc1" class="control-label mb-md-3 mb-2">
                                    {$languageFrontWeb->recommend_currup->display->$currentLangWeb} <span>*</span>
                                </label>
                                <ol>
                                    <li>{$languageFrontWeb->recommend_currup_note1->display->$currentLangWeb}</li>
                                    <li>{$languageFrontWeb->recommend_currup_note2->display->$currentLangWeb}</li>
                                    <li>{$languageFrontWeb->recommend_currup_note3->display->$currentLangWeb}</li>
                                </ol>
                                <input type="text" id="inputComplaintDesc1" value="" name="inputComplaintDesc1" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label for="detail2" class="control-label mb-md-3 mb-2">
                                    {$languageFrontWeb->recommend_rich->display->$currentLangWeb} <span>*</span>
                                </label>
                                <ol>
                                    <li>{$languageFrontWeb->recommend_rich_note1->display->$currentLangWeb}</li>
                                    <li>{$languageFrontWeb->recommend_rich_note2->display->$currentLangWeb}</li>
                                    <li>{$languageFrontWeb->recommend_rich_note3->display->$currentLangWeb}</li>
                                </ol>
                                <input type="text" id="inputComplaintDesc2" value="" name="inputComplaintDesc2" placeholder="{$languageFrontWeb->contant_answer->display->$currentLangWeb}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label mb-md-3 mb-2">
                                    {$languageFrontWeb->recommend_confirm->display->$currentLangWeb} <span>*</span>
                                </label>
                                <div class="block-control mb-md-3 mb-2">
                                    <div class="radio-control">
                                    <input type="radio" id="inputComplaintConfirm1" value="1" name="inputComplaintConfirm" class="form-control" checked>
                                    <div class="icon"></div>
                                    <div class="title">{$languageFrontWeb->recommend_confirm_note1->display->$currentLangWeb}</div>
                                    </div>
                                </div>
                                <div class="block-control">
                                    <div class="radio-control">
                                    <input type="radio" id="inputComplaintConfirm1" value="2" name="inputComplaintConfirm" class="form-control">
                                    <div class="icon"></div>
                                    <div class="title">{$languageFrontWeb->recommend_confirm_note2->display->$currentLangWeb}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-secret="{$recaptcha_sitekey}">
                                <button type="submit" class="btn btn-primary disabled" id="submit-form">{$languageFrontWeb->contact_send->display->$currentLangWeb}</button>
                                <a href="javascript:void(0);" onclick="reload_form();" class="btn btn-primary btn-cancel">{$languageFrontWeb->contact_cancel->display->$currentLangWeb}</a>
                            </div>
                        </div>
                        {* End Step 2 *}

                        {* Start Step 3 *}
                        <div class="-form-step3" style="display: none;">
                            <div class="form-success">
                                <div class="icon">
                                    <svg id="check-2" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                                    <path id="Path_452749" data-name="Path 452749" d="M50,0a50,50,0,1,0,50,50A50.055,50.055,0,0,0,50,0Zm0,0" fill="#2ab170" />
                                    <path id="Path_452750" data-name="Path 452750" d="M75.342,39.4,48.258,66.487a4.163,4.163,0,0,1-5.891,0L28.825,52.946a4.166,4.166,0,0,1,5.891-5.891l10.6,10.6L69.45,33.513A4.166,4.166,0,0,1,75.342,39.4Zm0,0" fill="#fafafa" />
                                    </svg>
                                </div>
                                <h3 class="title">{$languageFrontWeb->contact_success->display->$currentLangWeb}</h3>
                            </div>
                            <div class="action">
                                <a href="javascript:void(0);" onclick="reload_form();" class="btn btn-primary">{$languageFrontWeb->contact_ok->display->$currentLangWeb}</a>
                            </div>
                        </div>
                        {* End Step 3 *}

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>