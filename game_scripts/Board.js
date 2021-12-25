class Board {

  constructor() {

    const BOARDWIDTH = 10;
    const BOARDHEIGHT = 10; // constants about the board

    this.SQUAREWIDTH = 52;
    this.SQUAREOFFSET = 2;

    this.grid = [] // will hold all squares

    for (let i = 0; i < BOARDWIDTH*BOARDHEIGHT; i++) {

      var tileYPos = BOARDHEIGHT - 1 - Math.floor(i/BOARDHEIGHT); // from bottom to top

      var tileXPos = i%BOARDWIDTH;
      if (tileYPos%2 == 1){
        tileXPos = BOARDWIDTH - 1 - tileXPos; // every other row if flipped
      }

      this.grid.push(new Square(i+1,tileXPos*(this.SQUAREWIDTH + this.SQUAREOFFSET),tileYPos*(this.SQUAREWIDTH + this.SQUAREOFFSET), 0)); // loop around and add all the squares
    }
  }

  draw(playerPos){
    for (let i = 0; i < this.grid.length; i++) {

      this.grid[i].draw(this.SQUAREWIDTH, this.SQUAREWIDTH); // draw the square

    }

    ctx.rotate(45 * Math.PI / 180);
    ctx.drawImage(imageHandler.images["s1"],320,-100,400,400);
    ctx.rotate(35 * Math.PI / 180);
    ctx.drawImage(imageHandler.images["s3"],150,-250,500,500);
    ctx.rotate(-40 * Math.PI / 180);
    ctx.drawImage(imageHandler.images["s2"],-70,-260,500,500);

    ctx.resetTransform();

    ctx.rotate(-75 * Math.PI / 180); // drawing the ladders
    ctx.drawImage(imageHandler.images["l1"],-390,50,80,550);
    ctx.rotate(135 * Math.PI / 180);
    ctx.drawImage(imageHandler.images["l2"],300,-70,80,240);
    ctx.rotate(30 * Math.PI / 180);
    ctx.drawImage(imageHandler.images["l3"],150,-610,80,800);

    ctx.resetTransform();

    for (let j = 0; j < playerPos.length; j++){
      this.grid[playerPos[j]].drawPlayerPos(j,this.SQUAREWIDTH, this.SQUAREWIDTH)
    }
  }
}
