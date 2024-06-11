<?php
$message = '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody>
          <tr>
              <td>
                  <table style="font-family: Arial, sans-serif; border:1px solid #ebebeb;" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                          <td>
                              <!-- body -->
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                      <td colspan="3" height="30"></td>
                                  </tr>
                                  <tr>
                                      <td width="40"></td>
                                      <td>
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                  <td>
                                                      <div style="font-size: 16px; font-weight: bold; color: #037ee5; line-height: 1em;">แจ้งเบาะแสการทุจริตประพฤติมิชอบ</div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td height="30"></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                  <div style="font-size: 14px; color: #666; line-height: 1.4em;">
                                                    หัวข้อ : ' . $_POST["inputTopic"] . ' ' . $_POST["registerLname"] . '<br/><br/> 
                                                    รายละเอียด : ' . $_POST["inputDesc"] . '<br/><br/> 
                                                    ชื่อ-นามสกุล : ' . $_POST["inputName"] . '<br/><br/>
                                                    ที่อยู่ : ' . $_POST["inputAddress"] . '<br/><br/>
                                                    เบอร์โทรศัพท์ : ' . $_POST["inputTel"] . '<br/><br/>
                                                    อีเมล์ : ' . $_POST["inputEmail"] . '<br/><br/>

                                                    ชื่อ-นามสกุล ของผู้ถูกร้อง : ' . $_POST["inputComplaintName"] . '<br/><br/>
                                                    ช่วงเวลาที่กระทำความผิด : ' . $_POST["inputComplaintTime"] . '<br/><br/>
                                                    ข้อเท็จจริง : ' . $array_text_fac[$_POST["inputComplaintFac1"]] . '<br/><br/>
                                                    กรณีการกระทำทุจริตต่อหน้าที่ : ' . $_POST["inputComplaintDesc1"] . '<br/><br/>
                                                    กรณีการกล่าวหาว่าร่ำรวยผิดปกติ : ' . $_POST["inputComplaintDesc2"] . '<br/><br/>
                                                    ข้าพเจ้าขอรับรองว่าเรื่องดังกล่าวเป็นเรื่องจริง : ' . $array_text_confirm[$_POST["inputComplaintConfirm1"]] . '<br/><br/>
                                                    <br/> กรมวิทยาศาสตร์การแพทย์ ได้รับข้อมูลของท่านเรียบร้อยแล้ว 
                                                    <br/>
                                                    <br/> ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่โทร '.$settingWeb['contact']->tel.'
                                                  </div>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                      <td width="40"></td>
                                  </td>
                                  <tr>
                                      <td colspan="3" height="40"></td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <!-- footer -->
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #fbfbfb;">
                                  <tr>
                                      <td colspan="5" height="30"></td>
                                  </tr>
                                  <tr>
                                      <td width="40"></td>
                                      <td valign="top">
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color: #fbfbfb;">
                                              <tr>
                                                  <td>
                                                      <div style="font-size: 13px; font-weight: bold; color: #037ee5; line-height: 1.2em;">
                                                        กรมวิทยาศาสตร์การแพทย์ กระทรวงสาธารณสุข<br/>
                                                        Department of Medical Sciences
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td height="8"></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div style="font-size: 11px; color: #999; line-height: 1.3em;">
                                                      ' . $settingWeb['contact']->address . '
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td height="8"></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                              <td><div style="font-size: 11px; color: #666;"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/tel.jpg" alt="" style="display: inline-block; vertical-align: middle;" /> ' . $settingWeb['contact']->tel . '</div></td>
                                                              <td><div style="font-size: 11px; color: #666;"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/fax.jpg" alt="" style="display: inline-block; vertical-align: middle;" /> ' . $settingWeb['contact']->fax . '</div></td>
                                                              <td><div style="font-size: 11px; color: #666;"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/email.jpg" alt="" style="display: inline-block; vertical-align: middle;" /> ' . $settingWeb['contact']->email . '</div></td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td height="14"></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <a href="' . $settingWeb['social']->Facebook->link . '" title="Facebook" target="_blank" rel="nofollow"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/social-fb.png" alt="" height="30" /></a>
                                                      <a href="' . $settingWeb['social']->Twitter->link . '" title="Twitter" target="_blank" rel="nofollow"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/social-tw.png" alt="" height="30" /></a>
                                                      <a href="' . $settingWeb['social']->Youtube->link . '" title="Youtube" target="_blank" rel="nofollow"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/social-yt.png" alt="" height="30" /></a>
                                                      <a href="' . $settingWeb['social']->Line->link . '" title="Line" target="_blank" rel="nofollow"><img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/social-li.png" alt="" height="30" /></a>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td height="20"></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div style="font-size: 11px; color: #999; line-height: 1.2em;">
                                                          สงวนลิขสิทธิ์ © พ.ศ.2567 กรมวิทยาศาสตร์การแพทย์
                                                      </div>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                      <td width="10"></td>
                                      <td width="80" valign="top">
                                          <img src="' . _URL . $path_template[$templateweb][0] . '/assets/img/static/brand.png" alt="" width="80" />
                                      </td>
                                      <td width="40"></td>
                                  </tr>
                                  <tr>
                                      <td colspan="5" height="30"></td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </tbody>
  </table>
';
// print_r($message);die;