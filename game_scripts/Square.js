class Square {

  constructor(n,x,y, isPlayer, isModifier){
    this.num = n;
    this.x = x;
    this.y = y;
    this.isPlayer = isPlayer; // contains 1 for player 1, 2 for player 2, 0 if there is no player
    this.isModifier = isModifier; // contains 0 for no snake/ladder, 1 for snake and 2 for ladder
  }

  draw(w, h){

    ctx.drawImage(imageHandler.images["t"+this.num.toString()],this.x,this.y,w,h);
  }

  drawPlayerPos(player,w,h){

    ctx.fillStyle = playerColours[player];
    ctx.fillRect(this.x,this.y,w,h);
  }
}
