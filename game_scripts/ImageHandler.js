
class ImageHandler{

  constructor(){
    this.images = {};
    this.count = 1;
  }

  addImage(path,label){
    const temp = new Image();
    temp.src = path;

    this.count += 1;

    temp.onload = function () {
        imageHandler.count -= 1;
        imageHandler.update();
    };

    this.images[label] = temp;
  }

  done(){
    this.count -= 1;
    this.update();
  }

  update(){
    if (this.count == 0){
      main.run();
    }
  }
}
