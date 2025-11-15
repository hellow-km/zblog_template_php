var canvas = document.getElementById("fireworksCanvas");
var ctx = canvas.getContext("2d");
window.onresize = function () {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
};
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// 监听整个网页的点击事件
document.body.addEventListener("click", function (event) {
    createFirework(event.clientX, event.clientY);
});

function createFirework(x, y) {
    var firework = new Firework(x, y);
    fireworks.push(firework);
    setTimeout(function () {
        fireworks.splice(fireworks.indexOf(firework), 1);
    }, 3000); // 1秒后删除该烟花对象
}

var fireworks = [];

function Firework(x, y) {
    this.x = x;
    this.y = y;
    this.particles = [];
    this.createParticles();
}

Firework.prototype.createParticles = function () {
    for (var i = 0; i < 30; i++) {
        var particle = {
            x: this.x,
            y: this.y,
            radius: Math.random() * 3,
            angle: Math.random() * Math.PI * 2,
            speed: Math.random() * 5 + 1,
            color: getRandomColor(),
        };
        this.particles.push(particle);
    }
};

Firework.prototype.update = function () {
    for (var i = 0; i < this.particles.length; i++) {
        var particle = this.particles[i];
        particle.x += Math.cos(particle.angle) * particle.speed;
        particle.y += Math.sin(particle.angle) * particle.speed;
        particle.radius *= 0.95; // 缩小半径
    }
};

Firework.prototype.draw = function () {
    for (var i = 0; i < this.particles.length; i++) {
        var particle = this.particles[i];
        ctx.beginPath();
        ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
        ctx.fillStyle = particle.color;
        ctx.fill();
    }
};

function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function animate() {
    requestAnimationFrame(animate);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    fireworks.forEach(function (firework) {
        firework.update();
        firework.draw();
    });
}

animate();
