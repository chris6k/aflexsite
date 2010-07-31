import org.lync.events.Event;

class org.lync.events.LoadEvent extends Event
{	
	public static var LOAD_START		:String = "LOAD_START";
	public static var LOAD_COMPLETE		:String = "LOAD_COMPLETE";
	public static var LOAD_INIT			:String = "LOAD_INIT";
	public static var QUEUE_START		:String = "QUEUE_START";
	public static var QUEUE_COMPLETE	:String = "QUEUE_COMPLETE";
	
    private var className				:String = "LoadEvent";

	function LoadEvent(type:String, target:Object)
	{
		super(type, target);
	}
}