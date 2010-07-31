//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷
//FileName: 加载文件
//Designer: KenZhu(http;//kenb.net)
//UpDate:   2008/08/18
//QQ群:     13454226
//∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷∷
_global.loadDegree = function(adUrl, objMC, Owidth, Oheight, Performance) {
	_txt.removeTextField();
	objMC.createEmptyMovieClip("adobjMc", this.getNextHighestDepth());
	var loadDArr:Array = new Array();
	loadDArr.onLoadInit = function(_mc:MovieClip) {
		Performance(objMC);
	};
	loadDArr.onLoadComplete = function(_mc:MovieClip) {
		_mc._parent._new.unloadMovie();
	};
	loadDArr.onLoadProgress = function(_mc:MovieClip, bytesLoaded:Number, bytesTotal:Number) {
		objMC.attachMovie("loadSMC", "_new", "8");
		loadMC = objMC._new;
		loadMC._width = Owidth-30;
		loadMC._x = objMC._width/2-loadMC._width/2;
		loadMC._y = Oheight/2-loadMC._height/2;
		Opercent = Math.floor((bytesLoaded/bytesTotal*10000)/100);
		_mc._parent._new.gotoAndStop(Opercent);
	};
	loadDArr.onLoadError = function(_mc:MovieClip) {
		_mc._parent._parent.createTextField("_txt", 999, 50, 50, 300, 30);
		_mc._parent._parent._txt.textColor = 0xff0000;
		_mc._parent._parent._txt.text = "加载失败!  "+adUrl;
		trace(_mc._parent._parent._txt.text+"    加载失败")
	};
	var loadNEWmovie:MovieClipLoader = new MovieClipLoader();
	loadNEWmovie.addListener(loadDArr);
	loadNEWmovie.loadClip(adUrl, objMC.adobjMc);
};