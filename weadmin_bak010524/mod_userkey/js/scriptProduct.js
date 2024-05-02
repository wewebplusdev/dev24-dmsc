// JavaScript Document
// ####################################### Start Product ################################################# //


function checkCodeProduct(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxCheckCodePro").show();
			jQuery("#boxCheckCodePro").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}



function openSelectType(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxTypeSelect").show();
			jQuery("#boxTypeSelect").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}



// ####################################### End Product ################################################# //



function checkDuplicateValue(typeInput) {
    var controlkey = jQuery('input[name="inputControlKey"]').val();
	

    
    if (!valEditID.value) {
      var editID = null;
    }else{
      var editID = valEditID.value;
    }
    
    if (typeInput == "ControlKey") {
      var TYPE = "POST";
      var URL = "checkControlKey.php";
      var dataSet = {
        "masterkey" : masterkey.value,
        "inputControlKey" : controlkey,
        "id" : editID
      };
      var alert_msg = "รหัสควบคุมนี้มีอยู่ในระบบแล้ว";
      var IDinput = "inputControlKey";
    }
    

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(data) {
          var data = jQuery.parseJSON(data);
          if (data.status == 'error') {
            alert(alert_msg);
            jQuery("#"+IDinput).addClass("formInputContantTbAlertY");
            jQuery("#"+IDinput).val('');
            jQuery("#"+IDinput).focus();
            jQuery("#inputSecretKey").text('');
            jQuery("#inputSecretKeyHidden").val('');
          } else {
            jQuery("#inputSecretKey").text('');
            jQuery("#inputSecretKeyHidden").val('');
            GenerateKey();
            jQuery("#"+IDinput).removeClass("formInputContantTbAlertY");
          }
          setTimeout(jQuery.unblockUI, 100);
          return false;
        }
    });
  }

  
  function GenerateKey(){
	var controlkey = jQuery("#inputControlKey").val();
	var secretkey = jQuery("#inputSecretKey").val();
	var textURL = jQuery("#inputSubject").val();
	 console.log(secretkey);
	if (isBlank(inputControlKey) ) {
	  jQuery("#inputSecretKey").val('');
	  jQuery("#inputSecretKeyHidden").val('');
	} else {
	  var ajax_secretkeyandurl = $.post("secretkey.php",{SecretKeyOLD:secretkey,inputControlKey:controlkey,inputurl:textURL});
	  ajax_secretkeyandurl.done(function(data){
		  // console.log(data);
		  jQuery("#inputSecretKey").val(data);
		  jQuery("#inputSecretKeyHidden").val(data);
		});
	}
  
  
}