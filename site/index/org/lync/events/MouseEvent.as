import org.lync.events.Event;

class org.lync.events.MouseEvent extends Event
{
	public static var CLICK				:String = "CLICK";
	public static var RELEASE			:String = "RELEASE";
	public static var RELEASE_OUTSIDE	:String = "RELEASE_OUTSIDE";
	public static var ROLL_OUT			:String = "ROLL_OUT";
	public static var ROLL_OVER			:String = "ROLL_OVER";
	public static var DRAG_OUT			:String = "DRAG_OUT";
	public static var DRAG_OVER			:String = "DRAG_OVER";

	private var className				:String = "MouseEvent";
	
	public function MouseEvent(type:String,  target:Object)
	{
		super(type, target);
	}
}