class org.lync.events.Event extends Object
{
	public static var COMPLETE	:String = "COMPLETE";
	public static var OPEN		:String = "OPEN";
	public static var REMOVED	:String = "REMOVED";
	public static var INIT		:String = "INIT";
	public static var UNLOAD	:String = "UNLOAD";
	
	public var type				:String;
	public var target			:Object;

	private var className		:String = "Event";
	
	function Event(type:String, target:Object)
	{
		this.type = type;
		this.target = target;
	}
	
	public function toString():String
	{
		var str:String = "";
		for (var i:String in this)
		{
			if (this[i] != undefined)
			{
				str += i + "=" + this[i] + " ";
			}
		}
		return "[" + this.className + " " + str.slice(0,str.length - 1) + "]";
	}
}
