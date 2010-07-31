import org.lync.events.Event;

class org.lync.events.ProgressEvent extends Event
{
	public static var PROGRESS	:String = "PROGRESS";

	public var bytesLoaded		:Number;
	public var bytesTotal		:Number;
	
	private var className		:String = "ProgressEvent";
	
	function ProgressEvent(type:String, target:Object, bytesLoaded:Number, bytesTotal:Number)
	{
		super(type, target);
		this.bytesLoaded = bytesLoaded;
		this.bytesTotal = bytesTotal;
	}
}