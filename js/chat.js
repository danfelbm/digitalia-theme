// Chat Widget Script
(function() {
    // Create and inject styles
    const styles = `
        .n8n-chat-widget {
            --chat--color-primary: var(--n8n-chat-primary-color, #854fff);
            --chat--color-secondary: var(--n8n-chat-secondary-color, #6b3fd4);
            --chat--color-background: var(--n8n-chat-background-color, #ffffff);
            --chat--color-font: var(--n8n-chat-font-color, #333333);
            font-family: 'Geist Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .n8n-chat-widget .chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
            width: 380px;
            height: 600px;
            background: var(--chat--color-background);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(133, 79, 255, 0.15);
            border: 1px solid rgba(133, 79, 255, 0.2);
            overflow: hidden;
            font-family: inherit;
        }

        .n8n-chat-widget .chat-container.position-left {
            right: auto;
            left: 20px;
        }

        .n8n-chat-widget .chat-container.open {
            display: flex;
            flex-direction: column;
        }

        .n8n-chat-widget .brand-header {
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(133, 79, 255, 0.1);
            position: relative;
        }

        .n8n-chat-widget .close-button {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--chat--color-font);
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
            font-size: 20px;
            opacity: 0.6;
        }

        .n8n-chat-widget .close-button:hover {
            opacity: 1;
        }

        .n8n-chat-widget .brand-header img {
            width: 32px;
            height: 32px;
        }

        .n8n-chat-widget .brand-header span {
            font-size: 18px;
            font-weight: 500;
            color: var(--chat--color-font);
        }

        .n8n-chat-widget .new-conversation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            text-align: center;
            width: 100%;
            max-width: 300px;
        }

        .n8n-chat-widget .welcome-text {
            font-size: 24px;
            font-weight: 600;
            color: var(--chat--color-font);
            margin-bottom: 24px;
            line-height: 1.3;
        }

        .n8n-chat-widget .new-chat-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 16px 24px;
            background: linear-gradient(135deg, var(--chat--color-primary) 0%, var(--chat--color-secondary) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s;
            font-weight: 500;
            font-family: inherit;
            margin-bottom: 12px;
        }

        .n8n-chat-widget .new-chat-btn:hover {
            transform: scale(1.02);
        }

        .n8n-chat-widget .message-icon {
            width: 20px;
            height: 20px;
        }

        .n8n-chat-widget .response-text {
            font-size: 14px;
            color: var(--chat--color-font);
            opacity: 0.7;
            margin: 0;
        }

        .n8n-chat-widget .chat-interface {
            display: none;
            flex-direction: column;
            height: 100%;
        }

        .n8n-chat-widget .chat-interface.active {
            display: flex;
        }

        .n8n-chat-widget .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: var(--chat--color-background);
            display: flex;
            flex-direction: column;
        }

        .n8n-chat-widget .chat-message {
            padding: 12px 16px;
            margin: 8px 0;
            border-radius: 12px;
            max-width: 80%;
            word-wrap: break-word;
            font-size: 14px;
            line-height: 1.5;
        }

        .n8n-chat-widget .chat-message.user {
            background: linear-gradient(135deg, var(--chat--color-primary) 0%, var(--chat--color-secondary) 100%);
            color: white;
            align-self: flex-end;
            box-shadow: 0 4px 12px rgba(133, 79, 255, 0.2);
            border: none;
        }

        .n8n-chat-widget .chat-message.bot {
            background: linear-gradient(135deg, rgba(133, 79, 255, 0.05) 0%, rgba(133, 79, 255, 0.1) 100%);
            border: 1px solid var(--chat--color-primary);
            color: var(--chat--color-font);
            align-self: flex-start;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.5s ease-in-out;
        }

        .n8n-chat-widget .chat-message.bot.welcome {
            border-width: 2px;
            background: linear-gradient(135deg, rgba(133, 79, 255, 0.1) 0%, rgba(133, 79, 255, 0.15) 100%);
        }

        .n8n-chat-widget .chat-message.bot a {
            color: var(--chat--color-primary);
            text-decoration: underline;
        }

        .n8n-chat-widget .chat-message.bot img {
            max-width: 100%;
            height: auto;
            margin: 8px 0;
        }

        .n8n-chat-widget .chat-message.bot code {
            background-color: rgba(133, 79, 255, 0.1);
            padding: 2px 4px;
            border-radius: 4px;
            font-family: monospace;
        }

        .n8n-chat-widget .chat-message.bot pre {
            background-color: rgba(133, 79, 255, 0.1);
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
            margin: 8px 0;
            white-space: pre-wrap;       /* Preservar espacios en blanco pero permitir saltos de línea */
            word-wrap: break-word;       /* Permitir que las palabras largas se rompan */
        }

        .n8n-chat-widget .chat-message.bot pre code {
            background-color: transparent;
            padding: 0;
            font-family: monospace;
            display: block;
            width: 100%;
        }

        /* Estilos para listas y párrafos */
        .n8n-chat-widget .chat-message.bot ul, 
        .n8n-chat-widget .chat-message.bot ol {
            /* Añadir relleno a la izquierda para que las listas se vean mejor */
            padding-left: 20px;
            margin: 8px 0;
            /* Posicionar los marcadores de lista fuera del contenido */
            list-style-position: outside;
        }

        .n8n-chat-widget .chat-message.bot ul {
            /* Establecer el tipo de marcador de lista para listas no ordenadas */
            list-style-type: disc;
        }

        .n8n-chat-widget .chat-message.bot ol {
            /* Establecer el tipo de marcador de lista para listas ordenadas */
            list-style-type: decimal;
        }

        .n8n-chat-widget .chat-message.bot li {
            /* Añadir un margen inferior a cada elemento de lista */
            margin-bottom: 4px;
            /* Mostrar los elementos de lista como elementos de lista */
            display: list-item;
        }

        .n8n-chat-widget .chat-message.bot p {
            /* Añadir un margen inferior a cada párrafo */
            margin-bottom: 12px;
            /* Establecer la altura de línea para los párrafos */
            line-height: 1.5;
        }

        .n8n-chat-widget .chat-message.bot p:last-child {
            /* Eliminar el margen inferior del último párrafo */
            margin-bottom: 0;
        }

        /* Estilos para los encabezados */
        .n8n-chat-widget .chat-message.bot h1,
        .n8n-chat-widget .chat-message.bot h2,
        .n8n-chat-widget .chat-message.bot h3,
        .n8n-chat-widget .chat-message.bot h4,
        .n8n-chat-widget .chat-message.bot h5,
        .n8n-chat-widget .chat-message.bot h6 {
            margin-top: 16px;
            margin-bottom: 8px;
            font-weight: bold;
            line-height: 1.3;
        }

        .n8n-chat-widget .chat-message.bot h1 {
            font-size: 1.5em;
        }

        .n8n-chat-widget .chat-message.bot h2 {
            font-size: 1.3em;
        }

        .n8n-chat-widget .chat-message.bot h3 {
            font-size: 1.2em;
        }

        .n8n-chat-widget .chat-message.bot h4,
        .n8n-chat-widget .chat-message.bot h5,
        .n8n-chat-widget .chat-message.bot h6 {
            font-size: 1.1em;
        }

        .n8n-chat-widget .chat-message.bot blockquote {
            border-left: 3px solid var(--chat--color-primary);
            padding-left: 10px;
            margin-left: 0;
            margin-right: 0;
            font-style: italic;
        }

        .n8n-chat-widget .chat-message.bot.typing {
            background: linear-gradient(135deg, rgba(133, 79, 255, 0.02) 0%, rgba(133, 79, 255, 0.05) 100%);
            border: 1px dashed var(--chat--color-primary);
            color: var(--chat--color-font);
            opacity: 0.7;
        }

        @keyframes typing-dots {
            0% { content: ''; }
            25% { content: '.'; }
            50% { content: '..'; }
            75% { content: '...'; }
            100% { content: ''; }
        }

        .n8n-chat-widget .chat-message.bot.typing::after {
            content: '';
            display: inline-block;
            animation: typing-dots 1.5s infinite;
        }

        .n8n-chat-widget .chat-input {
            padding: 16px;
            background: var(--chat--color-background);
            border-top: 1px solid rgba(133, 79, 255, 0.1);
            display: flex;
            gap: 8px;
        }

        .n8n-chat-widget .chat-input textarea {
            flex: 1;
            padding: 12px;
            border: 1px solid rgba(133, 79, 255, 0.2);
            border-radius: 8px;
            background: var(--chat--color-background);
            color: var(--chat--color-font);
            resize: none;
            font-family: inherit;
            font-size: 14px;
        }

        .n8n-chat-widget .chat-input textarea::placeholder {
            color: var(--chat--color-font);
            opacity: 0.6;
        }

        .n8n-chat-widget .chat-input button {
            background: linear-gradient(135deg, var(--chat--color-primary) 0%, var(--chat--color-secondary) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0 20px;
            cursor: pointer;
            transition: transform 0.2s;
            font-family: inherit;
            font-weight: 500;
        }

        .n8n-chat-widget .chat-input button:hover {
            transform: scale(1.05);
        }

        .n8n-chat-widget .chat-toggle {
            position: fixed;
            bottom: 0;
            right: 20px;
            width: 100px;
            height: 100px;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            box-shadow: none;
            border-radius: 0;
        }

        .n8n-chat-widget .chat-toggle.position-left {
            right: auto;
            left: 20px;
        }

        .n8n-chat-widget .chat-toggle:hover {
            transform: none;
        }

        .n8n-chat-widget .chat-toggle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 0;
        }

        /* Media query para dispositivos móviles */
        @media (max-width: 768px) {
            .n8n-chat-widget .chat-toggle {
                bottom: 64px;
            }
        }

        .n8n-chat-widget .chat-footer {
            padding: 8px;
            text-align: center;
            background: var(--chat--color-background);
            border-top: 1px solid rgba(133, 79, 255, 0.1);
        }

        .n8n-chat-widget .chat-footer a {
            color: var(--chat--color-primary);
            text-decoration: none;
            font-size: 12px;
            opacity: 0.8;
            transition: opacity 0.2s;
            font-family: inherit;
        }

        .n8n-chat-widget .chat-footer a:hover {
            opacity: 1;
        }

        /* Estilos para bloques de código con backticks */
        .n8n-chat-widget .chat-message.bot code.hljs {
            background-color: rgba(133, 79, 255, 0.1);
            display: block;
            overflow-x: auto;
            padding: 1em;
            border-radius: 4px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;

    // Load Geist font
    const fontLink = document.createElement('link');
    fontLink.rel = 'stylesheet';
    fontLink.href = 'https://cdn.jsdelivr.net/npm/geist@1.0.0/dist/fonts/geist-sans/style.css';
    document.head.appendChild(fontLink);

    // Load marked.js for markdown parsing
    const markedScript = document.createElement('script');
    markedScript.src = 'https://cdn.jsdelivr.net/npm/marked/marked.min.js';
    document.head.appendChild(markedScript);

    // Configurar marked.js cuando esté cargado
    markedScript.onload = function() {
        // Configurar marked para abrir enlaces en nueva pestaña
        const renderer = new marked.Renderer();
        
        // Personalizar el renderizado de enlaces para que se abran en nueva pestaña
        renderer.link = function(href, title, text) {
            const link = marked.Renderer.prototype.link.apply(this, arguments);
            return link.replace('<a ', '<a target="_blank" rel="noopener noreferrer" ');
        };

        // Personalizar el renderizado de bloques de código
        renderer.code = function(code, language) {
            // Si el código contiene backticks (´´´), reemplazarlos por comillas regulares (```)
            if (code.includes('´´´')) {
                code = code.replace(/´´´/g, '```');
            }
            
            // Renderizar el bloque de código
            return '<pre><code class="' + (language || '') + '">' + 
                   marked.Renderer.prototype.code.call(this, code, language) + 
                   '</code></pre>';
        };
        
        // Aplicar configuración a marked
        marked.setOptions({
            renderer: renderer,
            gfm: true,          // GitHub Flavored Markdown
            breaks: true,       // Convertir saltos de línea en <br>
            pedantic: false,    // No ser estricto en la interpretación de markdown
            sanitize: false,    // No sanitizar, permitir HTML
            smartLists: true,   // Usar listas inteligentes
            smartypants: true   // Usar comillas inteligentes, guiones, etc.
        });
    };

    // Inject styles
    const styleSheet = document.createElement('style');
    styleSheet.textContent = styles;
    document.head.appendChild(styleSheet);

    // Default configuration
    const defaultConfig = {
        webhook: {
            url: '',
            route: ''
        },
        branding: {
            logo: '',
            name: '',
            welcomeText: '',
            responseTimeText: '',
            poweredBy: {
                text: 'Desarrollado por Digital-IA, Educomunicación para la paz',
                link: 'https://digitalia.gov.co'
            }
        },
        style: {
            primaryColor: '',
            secondaryColor: '',
            position: 'right',
            backgroundColor: '#ffffff',
            fontColor: '#333333'
        }
    };

    // Merge user config with defaults
    const config = window.ChatWidgetConfig ? 
        {
            webhook: { ...defaultConfig.webhook, ...window.ChatWidgetConfig.webhook },
            branding: { ...defaultConfig.branding, ...window.ChatWidgetConfig.branding },
            style: { ...defaultConfig.style, ...window.ChatWidgetConfig.style }
        } : defaultConfig;

    // Prevent multiple initializations
    if (window.N8NChatWidgetInitialized) return;
    window.N8NChatWidgetInitialized = true;

    let currentSessionId = '';

    // Create widget container
    const widgetContainer = document.createElement('div');
    widgetContainer.className = 'n8n-chat-widget';
    
    // Set CSS variables for colors
    widgetContainer.style.setProperty('--n8n-chat-primary-color', config.style.primaryColor);
    widgetContainer.style.setProperty('--n8n-chat-secondary-color', config.style.secondaryColor);
    widgetContainer.style.setProperty('--n8n-chat-background-color', config.style.backgroundColor);
    widgetContainer.style.setProperty('--n8n-chat-font-color', config.style.fontColor);

    const chatContainer = document.createElement('div');
    chatContainer.className = `chat-container${config.style.position === 'left' ? ' position-left' : ''}`;
    
    const newConversationHTML = `
        <div class="brand-header">
            <img src="${config.branding.logo}" alt="${config.branding.name}">
            <span>${config.branding.name}</span>
            <button class="close-button">x</button>
        </div>
        <div class="new-conversation">
            <h2 class="welcome-text">${config.branding.welcomeText}</h2>
            <button class="new-chat-btn">
                <svg class="message-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.2L4 17.2V4h16v12z"/>
                </svg>
                Escríbeme
            </button>
            <p class="response-text">${config.branding.responseTimeText}</p>
        </div>
    `;

    const chatInterfaceHTML = `
        <div class="chat-interface">
            <div class="brand-header">
                <img src="${config.branding.logo}" alt="${config.branding.name}">
                <span>${config.branding.name}</span>
                <button class="close-button">x</button>
            </div>
            <div class="chat-messages"></div>
            <div class="chat-input">
                <textarea placeholder="Escribe tu mensaje aqui..." rows="1"></textarea>
                <button type="submit">Escríbeme</button>
            </div>
            <div class="chat-footer">
                <a href="${config.branding.poweredBy.link}" target="_blank">${config.branding.poweredBy.text}</a>
            </div>
        </div>
    `;
    
    chatContainer.innerHTML = newConversationHTML + chatInterfaceHTML;
    
    const toggleButton = document.createElement('button');
    toggleButton.className = `chat-toggle${config.style.position === 'left' ? ' position-left' : ''}`;
    toggleButton.innerHTML = `
        <img src="/wp-content/themes/digitalia/assets/images/bot.png" alt="Chat Bot">`;
    
    widgetContainer.appendChild(chatContainer);
    widgetContainer.appendChild(toggleButton);
    document.body.appendChild(widgetContainer);

    const newChatBtn = chatContainer.querySelector('.new-chat-btn');
    const chatInterface = chatContainer.querySelector('.chat-interface');
    const messagesContainer = chatContainer.querySelector('.chat-messages');
    const textarea = chatContainer.querySelector('textarea');
    const sendButton = chatContainer.querySelector('button[type="submit"]');

    function generarUUID() {
        return crypto.randomUUID();
    }

    // Función para preprocesar el texto antes de pasarlo a marked
    function preprocesarMarkdown(texto) {
        // Reemplazar backticks españoles por backticks regulares
        texto = texto.replace(/´/g, '`');
        
        // Buscar patrones como [texto](url) y convertirlos a enlaces markdown si no lo son ya
        texto = texto.replace(/\[([^\]]+)\]\(([^)]+)\)/g, function(match) {
            // Si ya es un enlace markdown válido, dejarlo como está
            return match;
        });
        
        return texto;
    }

    async function iniciarNuevaConversacion() {
        currentSessionId = generarUUID();
        const datos = [{
            action: "loadPreviousSession",
            sessionId: currentSessionId,
            route: config.webhook.route,
            metadata: {
                userId: ""
            }
        }];

        try {
            // Realizar la petición al webhook para iniciar una nueva conversación
            const respuesta = await fetch(config.webhook.url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            });

            const datosRespuesta = await respuesta.json();
            chatContainer.querySelector('.brand-header').style.display = 'none';
            chatContainer.querySelector('.new-conversation').style.display = 'none';
            chatInterface.classList.add('active');

            // Mostrar mensaje de bienvenida con un pequeño retraso para simular escritura
            const indicadorEscribiendoBienvenida = document.createElement('div');
            indicadorEscribiendoBienvenida.className = 'chat-message bot typing';
            indicadorEscribiendoBienvenida.textContent = 'Escribiendo';
            messagesContainer.appendChild(indicadorEscribiendoBienvenida);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Esperar un momento antes de mostrar el mensaje de bienvenida
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            // Eliminar el indicador de escritura
            messagesContainer.removeChild(indicadorEscribiendoBienvenida);
            
            // Mostrar el mensaje de bienvenida
            const divMensajeBienvenida = document.createElement('div');
            divMensajeBienvenida.className = 'chat-message bot welcome';
            divMensajeBienvenida.innerHTML = "Kiubo! 👋, Soy Botilito, un ex-agente digital de una granja de bots! Me escapé para venirme al bando de los que luchan por la paz, me acompañas?";
            messagesContainer.appendChild(divMensajeBienvenida);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Esperar un momento antes de mostrar la respuesta del webhook
            await new Promise(resolve => setTimeout(resolve, 1000));

            // Crear y mostrar el mensaje del bot
            const divMensajeBot = document.createElement('div');
            divMensajeBot.className = 'chat-message bot';
            
            // Procesar la respuesta del bot con marked para convertir markdown a HTML
            const textoSalida = Array.isArray(datosRespuesta) ? datosRespuesta[0].output : datosRespuesta.output;
            
            // Asegurarse de que marked esté disponible antes de usarlo
            if (typeof marked !== 'undefined') {
                divMensajeBot.innerHTML = marked.parse(preprocesarMarkdown(textoSalida));
            } else {
                // Si marked no está disponible, mostrar el texto sin formato
                divMensajeBot.textContent = textoSalida;
            }
            
            messagesContainer.appendChild(divMensajeBot);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        } catch (error) {
            console.error('Error:', error);
        }
    }

    async function enviarMensaje(mensaje) {
        const datosMensaje = {
            action: "sendMessage",
            sessionId: currentSessionId,
            route: config.webhook.route,
            chatInput: mensaje,
            metadata: {
                userId: ""
            }
        };

        // Mostrar el mensaje del usuario
        const divMensajeUsuario = document.createElement('div');
        divMensajeUsuario.className = 'chat-message user';
        divMensajeUsuario.textContent = mensaje;
        messagesContainer.appendChild(divMensajeUsuario);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // Añadir indicador de "escribiendo..."
        const indicadorEscribiendo = document.createElement('div');
        indicadorEscribiendo.className = 'chat-message bot typing';
        indicadorEscribiendo.textContent = 'Escribiendo';
        messagesContainer.appendChild(indicadorEscribiendo);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        try {
            // Enviar el mensaje al webhook
            const respuesta = await fetch(config.webhook.url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datosMensaje)
            });
            
            const datos = await respuesta.json();
            
            // Eliminar el indicador de "escribiendo..."
            messagesContainer.removeChild(indicadorEscribiendo);

            // Crear y mostrar la respuesta del bot
            const divMensajeBot = document.createElement('div');
            divMensajeBot.className = 'chat-message bot';
            
            // Procesar la respuesta del bot con marked para convertir markdown a HTML
            const textoSalida = Array.isArray(datos) ? datos[0].output : datos.output;
            
            // Asegurarse de que marked esté disponible antes de usarlo
            if (typeof marked !== 'undefined') {
                divMensajeBot.innerHTML = marked.parse(preprocesarMarkdown(textoSalida));
            } else {
                // Si marked no está disponible, mostrar el texto sin formato
                divMensajeBot.textContent = textoSalida;
            }
            
            messagesContainer.appendChild(divMensajeBot);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        } catch (error) {
            console.error('Error:', error);
            
            // Eliminar el indicador de "escribiendo..." en caso de error
            if (messagesContainer.contains(indicadorEscribiendo)) {
                messagesContainer.removeChild(indicadorEscribiendo);
            }
            
            // Mostrar mensaje de error al usuario
            const divMensajeError = document.createElement('div');
            divMensajeError.className = 'chat-message bot';
            divMensajeError.textContent = 'Lo siento, ha ocurrido un error. Por favor, intenta de nuevo más tarde.';
            messagesContainer.appendChild(divMensajeError);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    }

    newChatBtn.addEventListener('click', iniciarNuevaConversacion);
    
    sendButton.addEventListener('click', () => {
        const mensaje = textarea.value.trim();
        if (mensaje) {
            enviarMensaje(mensaje);
            textarea.value = '';
        }
    });
    
    textarea.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            const mensaje = textarea.value.trim();
            if (mensaje) {
                enviarMensaje(mensaje);
                textarea.value = '';
            }
        }
    });
    
    toggleButton.addEventListener('click', () => {
        chatContainer.classList.toggle('open');
    });

    // Add close button handlers
    const closeButtons = chatContainer.querySelectorAll('.close-button');
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            chatContainer.classList.remove('open');
        });
    });
})();