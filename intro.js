// intro.js

let currentSection = 0;
const sections = document.querySelectorAll(".intro-section");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const startBtn = document.getElementById("startBtn");

// Mostrar la sección actual
function showSection(index) {
    sections.forEach((section, i) => {
        section.classList.toggle("active", i === index);
    });

    // Ocultar/mostrar botones de navegación
    prevBtn.style.display = index === 0 ? "none" : "inline-block";
    nextBtn.style.display = index === sections.length - 1 ? "none" : "inline-block";
    startBtn.style.display = index === sections.length - 1 ? "inline-block" : "none";
}

// Navegar a la sección anterior
function prevSection() {
    if (currentSection > 0) {
        currentSection--;
        showSection(currentSection);
    }
}

// Navegar a la siguiente sección
function nextSection() {
    if (currentSection < sections.length - 1) {
        currentSection++;
        showSection(currentSection);
    }
}

// Ir al chat
function startChatWithElsa() {
    localStorage.setItem("hasSeenIntroduction", "false"); // Marcar que ya ha visto la introducción
    window.location.href = "chat.html"; // Redirigir al chat
}

// Inicializar la primera sección
showSection(currentSection);