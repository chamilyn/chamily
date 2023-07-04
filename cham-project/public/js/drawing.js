const canvas = document.querySelector("canvas"),
toolBtns = document.querySelectorAll(".tool"),
fillColor = document.querySelector("#fill-color"),
sizeSlider = document.querySelector("#size-slider"),
colorBtns = document.querySelectorAll(".colors .option"),
colorPicker = document.querySelector("#color-picker"),
clearCanvas = document.querySelector(".clear-canvas"),
saveImg = document.querySelector(".save-img"),
ctx = canvas.getContext("2d");
let drawingHistory = [];
const undoBtn = document.getElementById('undo-btn');
// global variables with default value
let prevMouseX, prevMouseY, snapshot,
isDrawing = false,
selectedTool = "brush",
brushWidth = 5,
selectedColor = "#000";
const setCanvasBackground = () => {
    // setting whole canvas background to white, so the downloaded img background will be white
    ctx.fillStyle = "#fff";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = selectedColor; // setting fillstyle back to the selectedColor, it'll be the brush color
}
window.addEventListener("load", () => {
    // setting canvas width/height.. offsetwidth/height returns viewable width/height of an element
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
    setCanvasBackground();
    
});
function undoDrawing() {
    if (drawingHistory.length > 0) {
      // Clear the canvas
      ctx.clearRect(0, 0, canvas.width, canvas.height);
  
      // Restore the previous drawing state
      drawingHistory.pop();
      if (drawingHistory.length > 0) {
        ctx.putImageData(drawingHistory[drawingHistory.length - 1], 0, 0);
      } else {
        // If the history is empty, set the initial state
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
      }
    }
    console.log(drawingHistory);
  }
  const drawRect = (e) => {
    if (e.type === 'mousemove') {
      ctx.beginPath();
      ctx.rect(e.offsetX, e.offsetY, prevMouseX - e.offsetX, prevMouseY - e.offsetY);
      if (!fillColor.checked) {
        ctx.stroke();
      } else {
        ctx.fill();
      }
    } else if (e.type === 'touchmove') {
      const touch = e.touches[0];
      ctx.beginPath();
      ctx.rect(touch.pageX - canvas.offsetLeft, touch.pageY - canvas.offsetTop, prevMouseX - (touch.pageX - canvas.offsetLeft), prevMouseY - (touch.pageY - canvas.offsetTop));
      if (!fillColor.checked) {
        ctx.stroke();
      } else {
        ctx.fill();
      }
    }
  };
  const drawCircle = (e) => {
    ctx.beginPath();
    let radius;
    if (e.type === 'mousemove') {
      radius = Math.sqrt(Math.pow((prevMouseX - e.offsetX), 2) + Math.pow((prevMouseY - e.offsetY), 2));
      ctx.arc(prevMouseX, prevMouseY, radius, 0, 2 * Math.PI);
    } else if (e.type === 'touchmove') {
      const touch = e.touches[0];
      radius = Math.sqrt(Math.pow((prevMouseX - (touch.pageX - canvas.offsetLeft)), 2) + Math.pow((prevMouseY - (touch.pageY - canvas.offsetTop)), 2));
      ctx.arc(prevMouseX, prevMouseY, radius, 0, 2 * Math.PI);
    }
    if (!fillColor.checked) {
      ctx.stroke();
    } else {
      ctx.fill();
    }
  };
  const drawTriangle = (e) => {
    ctx.beginPath();
    if (e.type === 'mousemove') {
      ctx.moveTo(prevMouseX, prevMouseY);
      ctx.lineTo(e.offsetX, e.offsetY);
      ctx.lineTo(prevMouseX * 2 - e.offsetX, e.offsetY);
      ctx.closePath();
    } else if (e.type === 'touchmove') {
      const touch = e.touches[0];
      ctx.moveTo(prevMouseX, prevMouseY);
      ctx.lineTo(touch.pageX - canvas.offsetLeft, touch.pageY - canvas.offsetTop);
      ctx.lineTo(prevMouseX * 2 - (touch.pageX - canvas.offsetLeft), touch.pageY - canvas.offsetTop);
      ctx.closePath();
    }
    if (!fillColor.checked) {
      ctx.stroke();
    } else {
      ctx.fill();
    }
  };
const startDraw = (e) => {
    isDrawing = true;
    if (e.type === 'mousedown') {
        prevMouseX = e.offsetX;
        prevMouseY = e.offsetY;
      } else if (e.type === 'touchstart') {
        e.preventDefault();
        const touch = e.touches[0];
        prevMouseX = touch.pageX - canvas.offsetLeft;
        prevMouseY = touch.pageY - canvas.offsetTop;
      }
    ctx.beginPath(); // creating new path to draw
    ctx.lineWidth = brushWidth; // passing brushSize as line width
    ctx.strokeStyle = selectedColor; // passing selectedColor as stroke style
    ctx.fillStyle = selectedColor; // passing selectedColor as fill style
    // copying canvas data & passing as snapshot value.. this avoids dragging the image
    snapshot = ctx.getImageData(0, 0, canvas.width, canvas.height);

}
const drawing = (e) => {
    if(!isDrawing) return; // if isDrawing is false return from here
    ctx.putImageData(snapshot, 0, 0); // adding copied canvas data on to this canvas
    if(selectedTool === "brush" || selectedTool === "eraser") {
        // if selected tool is eraser then set strokeStyle to white 
        // to paint white color on to the existing canvas content else set the stroke color to selected color
        ctx.strokeStyle = selectedTool === "eraser" ? "#fff" : selectedColor;
        if (e.type === 'mousemove') {
            ctx.lineTo(e.offsetX, e.offsetY);
          } else if (e.type === 'touchmove') {
            e.preventDefault();
            const touch = e.touches[0];
            ctx.lineTo(touch.pageX - canvas.offsetLeft, touch.pageY - canvas.offsetTop);
          }
        ctx.stroke(); // drawing/filling line with color
    } else if(selectedTool === "rectangle"){
        drawRect(e);
    } else if(selectedTool === "circle"){
        drawCircle(e);
    } else {
        drawTriangle(e);
    }
}
function stopDrawing(e) {
    isDrawing = false;
  
    if (e.type === 'mouseup' || e.type === 'touchend') {
      e.preventDefault();
        // Save the current state to drawingHistory
        const snapshot = ctx.getImageData(0, 0, canvas.width, canvas.height);
        drawingHistory.push(snapshot);
      }
  }
toolBtns.forEach(btn => {
    btn.addEventListener("click", () => { // adding click event to all tool option
        // removing active class from the previous option and adding on current clicked option
        document.querySelector(".options .active").classList.remove("active");
        btn.classList.add("active");
        selectedTool = btn.id;
    });
});
sizeSlider.addEventListener("change", () => brushWidth = sizeSlider.value); // passing slider value as brushSize
colorBtns.forEach(btn => {
    btn.addEventListener("click", () => { // adding click event to all color button
        // removing selected class from the previous option and adding on current clicked option
        document.querySelector(".options .selected").classList.remove("selected");
        btn.classList.add("selected");
        // passing selected btn background color as selectedColor value
        selectedColor = window.getComputedStyle(btn).getPropertyValue("background-color");
    });
});
colorPicker.addEventListener("change", () => {
    // passing picked color value from color picker to last color btn background
    colorPicker.parentElement.style.background = colorPicker.value;
    colorPicker.parentElement.click();
});
clearCanvas.addEventListener("click", () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // clearing whole canvas
    setCanvasBackground();
});
saveImg.addEventListener("click", () => {
    const link = document.createElement("a"); // creating <a> element
    link.download = `${Date.now()}.jpg`; // passing current date as link download value
    link.href = canvas.toDataURL(); // passing canvasData as link href value
    link.click(); // clicking link to download image
});
undoBtn.addEventListener('click', undoDrawing);

canvas.addEventListener("mousedown", startDraw);
canvas.addEventListener("mousemove", drawing);
canvas.addEventListener("mouseup", stopDrawing);

canvas.addEventListener('touchstart', startDraw);
canvas.addEventListener('touchmove', drawing);
canvas.addEventListener('touchend', stopDrawing);