
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷顺放倒放
_global.rplay =function(mcname,ptype){
	if (ptype==true){
		delete mcname["onEnterFrame"];
		mcname.play();
	}
	if (ptype==false){
		mcname.stop();
		mcname.onEnterFrame = function() {
		this.prevFrame();
		}
	}
}
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷END
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷透明函数
_global.mcalpha=function(_mc,type) {
	if (type==true){////trace("_mc="+_mc)
		_mc._alpha = 1;
		_mc.onEnterFrame = function() {
		this._alpha += 10;
		this._alpha>=95 ? delete this.onEnterFrame:zhuzhu;
		};
		_mc._visible = true;
	}
	if (type==false){
		_mc.onEnterFrame = function() {
		this._alpha -= 10;
		this._alpha<=1 ? delete this.onEnterFrame:zhuzhu;
		}
	}
}
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷END
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷取小数点的函数
_global.point = function ( Decimal:Number,JW){//point(要过滤的值,取的位数)
		NValue2 = String(Decimal);
		var dhValue:Array = NValue2.split("");
		var DSValue:String = "";
		for (var p:Number =0 ; p < dhValue.length; p++) {
			DSValue += dhValue[p]
			if (dhValue[p] == "."){
				escFor = p+JW
			}
			if (p == escFor){
				break; 
			}
		}
		NewValue = Number(DSValue)
		//trace(Decimal+"  取"+JW+"位小数点是:"+NewValue)
		return (NewValue)
	}
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷END