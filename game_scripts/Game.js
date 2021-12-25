
class Game { // Object to hold the main game

  constructor(playerCount){ // object constructor runs once at the start, set up things?

    this.playerCount = playerCount;

    this.playerPos = []; // position of players

    for(var i = 0; i < this.playerCount; i++) {
      this.playerPos.push(0);
    }

    this.playerTurn = 0; // indicates players turn

    this.snakeStat = 0;
    this.ladderStat = 0;

    this.board = new Board(); // instantiate board class

    this.rollButton = new Button(600,250,100,50,"Roll!");

    this.pipes = [ //snakes and ladders;
      [17,29],
      [32,47],
      [63,70], // ladders

      [25,7],
      [48,30],
      [86,70] // snakes

    ]

    //draw board for first time
    this.drawBoard();
  }

  click(x,y){ // if button clicked on
    if (this.rollButton.getPressed(x,y)){
      this.roll();
    }
    return false;
  }

   // draws the board
  drawBoard() {
    //clear the screen before drawing new stuff
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    this.drawExplanations(); // show explanation of which square is which player

    this.board.draw(this.playerPos);
    this.rollButton.draw();
  }

  // show explanation of which square is which player
  drawExplanations() {

    for (let i = 0; i < this.playerCount; i++){ // for each player

      var xPos = 600 + 150*Math.floor(i/3);
      var yPos = (i%3)*75 + 25;

      ctx.fillStyle = playerColours[i];
      ctx.fillRect(xPos, yPos, 50, 50); // show its colour

      ctx.fillStyle = 'rgb(0, 0, 0)';
      ctx.font = "14px Arial";
      ctx.fillText("Player "+(i+1).toString(), xPos+80, yPos+25); // label it
    }
  }

  // executed when player clicks ROLL
  roll() {
    let sameSpot = false; // true if players are in the same spot

    this.playerTurn ++; // flips the player's turns!
    this.playerTurn = this.playerTurn%this.playerCount;

    let roll = Math.floor((Math.random() * 6) + 1); // generate a roll from 1 to 6

    this.playerPos[this.playerTurn] = Math.min(this.playerPos[this.playerTurn] + roll,99);

    var bounced = true;

    while (bounced){ // bounce player forward if they land on the same spot
      bounced = false
      for (let i = 0; i < this.playerCount; i++){
        if (i != this.playerTurn){
          if (this.playerPos[this.playerTurn] == this.playerPos[i]){
            sameSpot = true;
            this.playerPos[this.playerTurn] ++;
            bounced = true
          }
        }
      }
    }



    // set player position if they land on a snake/ladder
    var shmoved = this.setPlayerPos();

    // re-draw the board
    this.drawBoard();

    var words;

    words = "Player " + (this.playerTurn + 1).toString() + " rolled a " + roll + "!";

    if (shmoved == 1) {
      words += " You landed on a ladder.";
    }
    else if (shmoved == 2) {
       words += " You landed on a snake.";
    }

    // let the player know when they landed on the other
    if (sameSpot) {
      words = "You landed on the other player!";
    }


    // see if anyone won!
    var result = this.getGameState();

    if (result != ""){
      words = result;
    }


    ctx.fillStyle = 'rgb(0, 0, 0)'; // output what happened
    ctx.font = "20px Arial";
    ctx.fillText(words, 740,350);


  }

  // sets the player position when they land on a snake or ladder
  setPlayerPos() {

    var ppos = this.playerPos[this.playerTurn];

    for (let i = 0; i < this.pipes.length; i++){

      if (ppos == this.pipes[i][0] - 1){
        this.playerPos[this.playerTurn] = this.pipes[i][1] - 1;

        if (this.pipes[i][0]<this.pipes[i][1]){
          this.ladderStat += 1;
          return 1; // if on a ladder
        } else {
          this.snakeStat += 1;
          return 2; // if on a snake
        }
      }
    }
    return 0; // retruning so the printed text can say if snaked or laddered


  }

  getGameState() {

    var out = "";

    // true if one of the players wins
    let gameOver = false;
    // if a player gets to or past the 100th square, they win

    for (let i = 0; i < this.playerCount; i++){
      if (this.playerPos[i] == 99){
        gameOver = true;
        out = "Game over! Player " + (i+1).toString() + " wins!";
      }
    }
    // if game is over, reset the player positions & turns and re-draw the board
    if (gameOver) {

      $.ajax({
        url: 'updateStats.php',
        type: 'post',
        data: { "snakes": this.snakeStat, "ladders": this.ladderStat},
        success: function(response) {}
    });


      this.snakeStat = 0;
      this.ladderStat = 0;

      for(var i = 0; i < this.playerCount; i++) {
        this.playerPos[i] = 0;
      }
      this.playerTurn = 0;
      this.drawBoard();
    }

    return out;
  }
}
