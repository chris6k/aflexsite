import org.lync.events.Event;

class org.lync.events.HTTPStatusEvent extends Event
{
	public static var HTTP_STATUS	:String = "HTTP_STATUS";
	public var status				:Number;
	private var className			:String = "HTTPStatusEvent";
	
	public function HTTPStatusEvent(type:String, target:Object, status:Number)
	{
		super(type, target);
		this.status = status;
	}
}
