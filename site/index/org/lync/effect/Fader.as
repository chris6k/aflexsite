class org.lync.effect.Fader
{
	public function Fader(){}
	
	public static function fadeIn(target:MovieClip, alpha:Number, speed:Number)
	{
		delete target.onEnterFrame;
		if(alpha == undefined)
		{
			alpha = 100;
		}
		target.onEnterFrame = function()
		{
			this._alpha += speed;
			if(this._alpha >= alpha)
			{
				delete this.onEnterFrame;				
			}
		}
	}
	
	public static function fadeOut(target:MovieClip, alpha:Number, speed:Number)
	{
		if(alpha == undefined)
		{
			alpha = 0;
		}
		target.onEnterFrame = function()
		{
			this._alpha -= speed;
			if(this._alpha <= alpha)
			{
				delete this.onEnterFrame;				
			}
		}
	}
}
