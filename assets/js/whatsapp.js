document.getElementById('whatsappBtn').addEventListener('click', function(event) {
      // Impedir a ação padrão do link
      event.preventDefault();

      // Tentar abrir o link usando JavaScript
      window.location.href = 'https://api.whatsapp.com/send?phone=4891222083';

      // Fallback para mensagem de erro se o WhatsApp não puder ser aberto
      setTimeout(function() {
        window.location.href = 'URL-DE-FALLBACK-OU-MENSAGEM-DE-ERRO';
      }, 3000); // Aguarda 3 segundos antes de redirecionar
    });