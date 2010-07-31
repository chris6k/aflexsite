import org.lync.events.Event;

class org.lync.events.SoundEvent extends Event
{
	public static var SOUND_START		:String = "SOUND_START";
	public static var SOUND_PAUSE		:String = "SOUND_PAUSE";
	public static var SOUND_STOP		:String = "SOUND_STOP";
	public static var SOUND_RESUME		:String = "SOUND_RESUME";
	public static var SOUND_COMPLETE	:String = "SOUND_COMPLETE";
	public static var SOUND_SEEK		:String = "SOUND_SEEK";

	private var className				:String = "SoundEvent";
	
	function SoundEvent(type:String, target:Object)
	{
		super(type, target);
	}
}
