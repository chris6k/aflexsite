import org.lync.events.Event;

class org.lync.events.IOErrorEvent extends Event
{
	public static var IO_ERROR	:String = "IO_ERROR";
	
	private var className		:String = "IOErrorEvent";
	
	function IOErrorEvent(type:String, target:Object)
	{
		super(type, target);
	}
}
