async function loadProgress() {
    const username = localStorage.getItem("username");
    if (!username) {
        console.error("Nombre de usuario no encontrado");
        return;
    }

    try {
        const response = await fetch(`load_progress.php?username=${username}`);
        if (!response.ok) throw new Error("Error al cargar el progreso");
        const progress = await response.json();

        if (progress) {
            currentChapter = progress.currentChapter;
            loadChat(currentChapter); // Cargar el capítulo actual

            // Mostrar los mensajes guardados
            const chatBox = document.getElementById("chatBox");
            progress.messages.forEach(message => {
                const messageElement = document.createElement("div");
                messageElement.classList.add("message", message.type);
                messageElement.textContent = message.text;
                messageElement.style.opacity = "1"; // Mostrar el mensaje con efecto de desvanecimiento
                chatBox.appendChild(messageElement);
            });
            scrollChatToBottom();
        }
    } catch (error) {
        console.error("Error al cargar el progreso:", error);
    }
}