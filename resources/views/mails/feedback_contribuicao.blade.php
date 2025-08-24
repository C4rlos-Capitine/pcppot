<h1>Resposta da Sugestão/reclamação</h1>
<p>Olá {{ $contribuicao->nome_completo }},</p>
<p>Obrigado por entrar em contato conosco. Agradecemos sua contribuição e gostaríamos de informar que analisamos sua sugestão/reclamação com atenção.</p>
<p>Segue abaixo nossa resposta:</p>
<p>{{ $contribuicao->resposta }}</p>
<p>Status da sua contribuição: {{ ucfirst($contribuicao->status) }}</p>
<p>Se você tiver mais dúvidas ou precisar de mais informações, não hesite em nos cont