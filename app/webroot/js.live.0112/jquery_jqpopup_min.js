/* jQpopup - jQuery Popup Box v0.2.1
 *  jQpopup is distributed under the terms of the MIT license
 *  For more information visit http://jqframework.com/jqpopup
 *  Copyright (C) 2009  jqframework.com
 * Do not remove this copyright message
 */
$.jQpopup={minHeight:100,minWidth:200,imagePath:"images/",popupwrapper:null,box:function(object_id){var popupwrapper='<div id="'+object_id+'_p" class="jqpopup">';
popupwrapper+='<div class="jqpopup_header"><div id="'+object_id+'_ph"></div>';
popupwrapper+="<div>";
popupwrapper+='<div id="'+object_id+'_pl" class="jqpopup_center"></div>';
popupwrapper+='<div id="'+object_id+'_px" class="jqpopup_cross"></div>';
popupwrapper+="</div>";
popupwrapper+="</div>";
popupwrapper+='<div id="'+object_id+'_pm" class="jqpopup_message"></div>';
popupwrapper+='<div id="'+object_id+'_pc" class="jqpopup_content"></div>';
popupwrapper+='<div id="'+object_id+'_pf" class="jqpopup_footer"></div>';
popupwrapper+='<div id="'+object_id+'_ps" class="jqpopup_resize"></div>';
popupwrapper+="</div>";
return popupwrapper
},toTopEvent:function(e){var rid=(this.id).substr(0,this.id.length-1);
var zMax=0;
$(".jqpopup").each(function(index){if($(this).css("zIndex")>zMax){zMax=$(this).css("zIndex")
}});
var val=parseInt(zMax)+1;
$("#"+rid).css("zIndex",val)
},toTop:function(id){var str=id.substr(id.length-2);
var rid=id;
if(str!="_p"){rid+="_p"
}var zMax=0;
$(".jqpopup").each(function(index){if($(this).css("zIndex")>zMax){zMax=$(this).css("zIndex")
}});
var val=parseInt(zMax)+1;
$("#"+rid).css("zIndex",val)
},toCenter:function(id){var top=parseInt($(window).scrollTop());
var left=parseInt($(window).scrollLeft());
var rid=id+"_p";
var pos=$("#"+rid).offset();
var box_x=parseInt($("#"+rid).width());
var box_y=parseInt($("#"+rid).height());
var center_x=parseInt($(window).width())/2-box_x/2+left;
var center_y=parseInt($(window).height())/2-box_y/2+top;
$("#"+rid).css({left:center_x,top:center_y})
},open:function(button_id,object_id){if($("#"+object_id).html()!=""){var content=$.jQpopup.box(object_id);
$("body").append(content);
$("#"+object_id+"_p").bgiframe();
$("#"+object_id+"_p").jqDrag(".jqpopup_header").jqResize(".jqpopup_resize");
$("#"+object_id+"_px").unbind("click");
$("#"+object_id+"_px").bind("click",function(){$("#"+object_id).jqpopup_close()
});
$("#"+object_id+"_pl").unbind("click");
$("#"+object_id+"_pl").bind("click",function(){$("#"+object_id).jqpopup_toCenter(this.id)
});
var pos=$("#"+button_id).offset();
var popup_x=parseInt(pos.left)+(parseInt($("#"+button_id).width()/2));
var popup_y=parseInt(pos.top)+parseInt($("#"+button_id).height());
$("#"+object_id+"_p").css({left:popup_x,top:popup_y});
var popup_content=$("#"+object_id).clone(true);
var title=$("#"+object_id).attr("title");
$("#"+object_id+"_ph").html(title);
$("#"+object_id+"_pc").html(popup_content.show());
$("#"+object_id+"_p").show();
$("#"+object_id+"_ph").mousedown($.jQpopup.toTopEvent);
$("#"+object_id).empty();
if($("#"+object_id+"_p").height()<$.jQpopup.minHeight){$("#"+object_id+"_p").css("height",$.jQpopup.minHeight+14)
}else{$("#"+object_id+"_p").css("height",$("#"+object_id+"_p").height()+14)
}if($("#"+object_id+"_p").width()<$.jQpopup.minWidth){$("#"+object_id+"_p").css("width",$.jQpopup.minWidth)
}$("#"+object_id+"_p").jqpopup_toTop()
}},close:function(object_id){var content=$("#"+object_id+"_pc").clone(true);
$("#"+object_id).html(content.show());
$("#"+object_id+"_pc").empty();
$("#"+object_id+"_p").hide()
}};
$.fn.extend({jqpopup_close:function(){return this.each(function(){$.jQpopup.close(this.id)
})
},jqpopup_open:function(button_id){return this.each(function(){$.jQpopup.open(button_id,this.id)
})
},jqpopup_toCenter:function(){return this.each(function(){$.jQpopup.toCenter(this.id)
})
},jqpopup_toTop:function(){return this.each(function(){$.jQpopup.toTop(this.id)
})
}});