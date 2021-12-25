
class Main{ // object to launch a menu or game from



  constructor(){ // object constructor runs once at the start, set up things?

    ctx.textAlign = "center";

    this.activeWindow;

  }

  run(){
    this.activeWindow = new Menu();
  }


  click(x,y){
    var val = this.activeWindow.click(x,y)
    if (val != 0){
      this.activeWindow = new Game(val);
    }
  }



}
