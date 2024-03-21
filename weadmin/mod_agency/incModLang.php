<?
if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {
} else {
	$langMod["meu:group"] = "กลุ่ม" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:sub"] = "กลุ่มย่อย" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

	$langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

	$langMod["txt:maptitle"] = "จัดการข้อมูลแผนที่";
	$langMod["txt:mapdetail"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดแผนที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:lat"] = "Latitude";
	$langMod["txt:long"] = "Longitude";
	$langMod["txt:gmap"] = "Google Map";
	$langMod["txt:titleadds"] = "สร้างข้อมูล" . $langMod["meu:sub"];
	$langMod["txt:titleedits"] = "แก้ไขข้อมูล" . $langMod["meu:sub"];
	$langMod["txt:titleviews"] = "แสดงผลข้อมูล" . $langMod["meu:sub"];
	$langMod["txt:sortpermiss"] = "จัดเรียงข้อมูล" . $langMod["meu:sub"];

	$langMod["txt:titleaddg"] = "สร้างข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleeditg"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleviewg"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
	$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];

	$langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:subjectDe"] = "โปรดป้อนข้อมูล" . $langMod["meu:group"] . "เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
	$langMod["txt:title"] = "ข้อมูลรายละเอียด" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	//$langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ(เปิดอ่าน)";
	$langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ ";
	$langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";

	$langMod["txt:attfiled"] = "ข้อมูลเอกสารแนบ(ดาวน์โหลด)";
	$langMod["txt:attfiledDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";

	$langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
	$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";
	$langMod["txt:date"] = "กำหนดวันที่ในการแสดงผล";
	$langMod["txt:dateDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["txt:datec"] = "กำหนดวันที่สร้างในการแสดงผล";
	$langMod["txt:datecDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่สร้างในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["txt:album"] = "ข้อมูลอัลบั้มภาพ";
	$langMod["txt:albumDe"] = "ข้อมูลอัลบั้มภาพ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้ ในรูปแบบภาพพสไลด์บนเว็บไซต์ของคุณ";
	$langMod["txt:video"] = "ข้อมูลวิดีโอ";
	$langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
	$langMod["txt:pic"] = "รูปภาพประกอบ";
	$langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";


	$langMod["inp:seotitle"] = "Tag Title";
	$langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
	$langMod["inp:seodes"] = "Tag Description";
	$langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
	$langMod["inp:seokey"] = "Tag Keywords";
	$langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

	$langMod["inp:album"] = "เลือกรูปภาพ";
	$langMod["inp:chfile"] = "เปลี่ยนชื่อเอกสารแนบ";
	$langMod["inp:sefile"] = "เลือกเอกสารแนบ";
	$langMod["inp:notefile"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .doc .docx .xls .xlsx .pdf .jpg, .png และ .gif เท่านั้น, อัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
	$langMod["inp:notedate"] = "หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
	$langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthPic . "x" . $sizeHeightPic . " พิกเซล";
	$langMod["inp:notealbum"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthAlbum . "x" . $sizeHeightAlbum . " พิกเซล";

	$langMod["tit:subject"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]) . " ";
	$langMod["tit:sdate"] = "วันเริ่มต้น ";
	$langMod["tit:edate"] = "วันสิ้นสุด ";
	$langMod["tit:title"] = "คำบรรยาย";
	$langMod["tit:typevdo"] = "ประเภทวิดีโอ";
	$langMod["tit:linkvdo"] = "เว็บไซต์ Youtube";
	$langMod["tit:uploadvdo"] = "อัพโหลดไฟล์";
	$langMod["tit:linkvdonote"] = "หมายเหตุ : เฉพาะชื่อ URL youtube.com เท่านั้น";
	$langMod["tit:uploadvdonote"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .flv, .wmv, .mp3, .wav, .wma, .avi และ .mpeg เท่านั้น";
	$langMod["tit:noteg"] = "คำอธิบาย ";

	$langMod["tit:selectg"] = "เลือก" . $langMod["meu:group"];
	$langMod["op:selectg"] = $langMod["meu:group"] . " (ทั้งหมด) ";
	$langMod["tit:selectgn"] = "ชื่อ" . $langMod["meu:group"] . " ";
	$langMod["txt:subjectg"] = "ข้อมูล" . $langMod["meu:group"];
	$langMod["txt:subjectgDe"] = "โปรดป้อนข้อมูล" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["tit:selects"] = "เลือก" . $langMod["meu:sub"];
	$langMod["op:selects"] = $langMod["meu:sub"] . " (ทั้งหมด) ";
	$langMod["tit:selectsn"] = "ชื่อ" . $langMod["meu:sub"] . " ";
	$langMod["txt:subjects"] = "ข้อมูล" . $langMod["meu:sub"];
	$langMod["txt:subjectsDe"] = "โปรดป้อนข้อมูล" . $langMod["meu:sub"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["file:type"] = "ประเภท";
	$langMod["file:size"] = "ขนาด";
	$langMod["file:download"] = "ดาวน์โหลด";

	$langMod["home:detail"] = "อ่านรายละเอียด";

	$langMod["tit:view"] = "เข้าชม ";
	$langMod["tit:inpName"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);

	$langMod["tit:my"] = "เดือน/ปีที่พิมพ์ ";
	$langMod["tit:sm"] = "เลือกเดือนที่พิมพ์ ";
	$langMod["tit:sy"] = "เลือกปีที่พิมพ์ ";
	$langMod["tit:ISBN"] = "เลข ISBN ";
	$langMod["tit:total"] = "จำนวนที่พิมพ์";
	$langMod["tit:print"] = "คำบรรยาย";



	$langMod = checkpageText($langMod);


	$langMod["txt:groupType"] = "ข้อมูลประเภทรายละเอียด";
	$langMod["txt:groupTypeDe"] = "กรุณากรอกส่วนที่ใช้ในกำหนดรายละเอียดการแสดงผลข่าว เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์";

	$langMod["tit:groupType"] = "ประเภทรายละเอียด";

	$langMod["tit:linkvdo"] = "ชื่อ URL ";
	$langMod["edit:linknote"] = "หมายเหตุ : กรุณากรอกชื่อ URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น" . "<br>" . "กรณีไม่มีชื่อ URL ให้ใส่เครื่องหมาย #";

	$langMod["tit:tel"] ="เบอร์โทรติดต่อ";
	$langMod["tit:telnote"] ="หากมีมากกว่า 1 หมายเลขให้ใส่ , คั่นระหว่างหมายเลข";
	$langMod["tit:fax"] ="โทรสาร";
	$langMod["tit:address"] ="ที่อยู่";
}
