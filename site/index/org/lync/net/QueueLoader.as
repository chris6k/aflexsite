import org.lync.events.LoadEvent;
import org.lync.events.ProgressEvent;
import org.lync.events.IOErrorEvent;
import org.lync.events.EventDispatcher;

class org.lync.net.QueueLoader extends EventDispatcher
{
	private var _list		:Array;
	private var _flist		:Array;
	private var _length		:Number;
	private var _busy		:Boolean = false;
	private var _loader		:MovieClipLoader;

	public function get length():Number
	{
		return _length;
	}

	public function get list():Array
	{
		return _list;
	}

	public function get finished():Array
	{
		return _flist;
	}

	public function get busy():Boolean
	{
		return _busy;
	}

	public function set finished(arr)
	{
		_flist = arr;
	}

	function QueueLoader()
	{
		EventDispatcher.initialize(this);
		_list = new Array();
		_flist = new Array()
		_length = 0;
		_loader = new MovieClipLoader();
		_loader.addListener(this);
	}

	public function onLoadProgress(target:MovieClip, bytesLoaded:Number, bytesTotal:Number):Void
	{
		dispatchEvent(new ProgressEvent(ProgressEvent.PROGRESS, target, bytesLoaded, bytesTotal));
	}

	public function onLoadStart(target:MovieClip):Void
	{
		dispatchEvent(new LoadEvent(LoadEvent.LOAD_START, target));
	}

	public function onLoadComplete(target:MovieClip):Void
	{
		dispatchEvent(new LoadEvent(LoadEvent.LOAD_COMPLETE, target));		
		_flist.push(_list.shift());
		if(_list.length>0)
		{
			_loader.loadClip(_list[0].url, _list[0].target);
		}else{
			dispatchEvent(new LoadEvent(LoadEvent.QUEUE_COMPLETE, this));
		}
	}

	public function onLoadInit(target:MovieClip):Void
	{
		dispatchEvent(new LoadEvent(LoadEvent.LOAD_INIT, target));
		if (_list.length == 0)
		{
			_length = 0;
			_busy = false;
			dispatchEvent(new LoadEvent(LoadEvent.QUEUE_COMPLETE, this));
		}
	}

	public function onLoadError(target:MovieClip):Void
	{
		dispatchEvent(new IOErrorEvent(IOErrorEvent.IO_ERROR, target));
		_flist.push(_list.shift());
		if (_list.length > 0)
		{
			_loader.loadClip(_list[0].url, _list[0].target);
		}else{		
			_length = 0;
			_busy = false;
			dispatchEvent(new LoadEvent(LoadEvent.QUEUE_COMPLETE, this));
		}
	}

	public function removeAll()
	{
		_list = new Array();
		_length  = 0;
	}

	public function removeItem(target:MovieClip)
	{
		for(var i=0; i<_list.length; i++)
		{
			if(_list[i].target == target)
			{
				_list.splice(i, 1);
				i--;
				if(_list.length == 0)
				{					
					_busy = false;
					dispatchEvent(new LoadEvent(LoadEvent.QUEUE_COMPLETE, this));
				}
				break;
			}
		}
	}
	
	public function addItem(obj:Object):Void
	{
		_list.push(obj);
		_length++;
		if (_list.length == 1)
		{
			_busy = true;
			_loader.loadClip(obj.url, obj.target);
			dispatchEvent(new LoadEvent(LoadEvent.LOAD_START, this));
		}
	}
}
