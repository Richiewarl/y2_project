class Button{

  constructor(x,y,w,h,text){
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
    this.text = text;

  }

  draw(){
    ctx.fillStyle = 'rgb(150, 150, 150)';
    ctx.fillRect(this.x, this.y, this.w, this.h);
    ctx.fillStyle = 'rgb(0, 0, 0)';
    ctx.font = "30px Arial";
    ctx.fillText(this.text, this.x + this.w/2, this.y + this.h*0.7);

  }

  getPressed(i,j){
    if (this.x <= i && i <= this.x + this.w){
      if (this.y <= j && j <= this.y + this.h){
        return true;
      }
    }
    return false;
  }


}
