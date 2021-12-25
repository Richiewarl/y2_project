
class Menu{ // ooh a main menu for launching a game

  constructor(){

    this.MINPLAYERS = 2;
    this.MAXPLAYERS = 6;
    this.buttons = []

    for (let i = this.MINPLAYERS; i <= this.MAXPLAYERS; i++) {
      this.buttons.push(new Button(380,i*60 + 50,200,50,i.toString() + " players!"));
    }


    this.draw();

  }

  click(x,y){
    for (let i = this.MINPLAYERS; i <= this.MAXPLAYERS; i++) {
      if (this.buttons[i-this.MINPLAYERS].getPressed(x,y)){
        return i;
      }
    }
    return 0;
  }

  draw() {

    ctx.drawImage(imageHandler.images['background'], 0, 0); // draw background

    for (let i = this.MINPLAYERS; i <= this.MAXPLAYERS; i++) {
      this.buttons[i-this.MINPLAYERS].draw();
    }

  }

}
