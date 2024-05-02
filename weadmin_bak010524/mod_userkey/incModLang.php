<?
if($_SESSION[$valSiteManage."core_session_language"]=="Eng"){

}else{
	if ($_REQUEST["menukeyid"] == 152) {
		$langMod["meu:group"] = "".getNameMenu($_REQUEST["menukeyid"]);
	}else {
		$langMod["meu:group"] = "".getNameMenu(152);
	}
		$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleadd"] = "สร้างข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "แก้ไขข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "แสดงผลข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleaddg"] = "สร้างข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleeditg"] = "แก้ไขข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleviewg"] = "แสดงผลข้อมูล".$langMod["meu:group"];
		$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล".$langMod["meu:group"];


		$langMod["txt:subject"] = "ข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectDe"] = "โปรดป้อนหัวข้อ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:title"] = "ข้อมูลรายละเอียด".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:pic"] = "รูปภาพประกอบ";
		$langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";

		$langMod["txt:seo"] = "กำหนดวันที่ในการแสดงผล";
		$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";


		$langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
		$langMod["edit:linknote"] ="หมายเหตุ : กรุณากรอก URL โดยไม่กรอก \"http://\" หรือ \"www\" เช่น wewebplus.com เป็นต้น";
		$langMod["inp:album"] ="เลือกรูปภาพ";
		$langMod["tit:subject"] ="หัวข้อ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:sdate"] ="วันเริ่มต้น ";
		$langMod["tit:edate"] ="วันสิ้นสุด ";
		$langMod["file:type"] ="ประเภท";
		$langMod["file:size"] ="ขนาด";
		$langMod["file:download"] ="ดาวน์โหลด";
		$langMod["tit:linkvdo"] ="URL เว็บไซต์";
		$langMod["home:detail"] ="อ่านรายละเอียด";
		$langMod["tit:typevdo"] ="การแสดงผล ";
		$langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthPic."x".$sizeHeightPic." พิกเซล";
		//$langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น รูปภาพที่ใช้ในการอัพโหลดควรมีขนาด 306x246 พิกเซล";


		$langMod["tit:selectg"] ="เลือก".$langMod["meu:group"];
		$langMod["tit:selectgn"] ="ชื่อ".$langMod["meu:group"]." ";
		$langMod["txt:subjectg"] = "ข้อมูล".$langMod["meu:group"];
		$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ".$langMod["meu:group"]." เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["tit:inpName"] = "ชื่อ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:noteg"] ="หมายเหตุ ";

		$langMod["tit:inpName"] = "ชื่อ".getNameMenu($_REQUEST["menukeyid"])." ";
		$langMod["tit:view"] ="จำนวนคลิก ";

		$langMod["tit:config"]="กำหนดค่าเริ่มต้น";
		$langMod["tit:viewconfDe"]="ข้อมูลจำนวนผู้เข้าชม เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["tit:viewconf"]="จำนวนผู้เข้าชม";
		$langMod["tit:controlkey"] = "รหัสควบคุม";
		$langMod["inp:notecontrolkey"] = "หมายเหตุ : กรุณากรอกรหัสควบคุมไม่เกิน 100 ตัวอักษร";
		$langMod["tit:secretkey"] = "Secret Key";

		$langTxt["pr:titlePer"] = "กำหนดสิทธิ์การเข้าใช้งานเว็บไซต์";
		$langTxt["pr:titlePerDe"] = "โปรดเลือกสิทธิ์การเข้าใช้งานเว็บไซต์ เพื่อใช้ในการจัดการเว็บไซต์ของคุณ ";
		$langTxt["mg:subject"] = "ชื่อเว็บไซต์";
		$langTxt["pr:manage"] = "สามารถเข้าถึง";
		$langTxt["pr:noaccess"] = "ไม่สามารถเข้าถึง";
}
?>
