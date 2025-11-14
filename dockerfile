# Imagem base do Nginx com versão fixa (mais confiável e leve)
FROM nginx:1.27-alpine

# Remove a configuração padrão para evitar conflitos
RUN rm /etc/nginx/conf.d/default.conf

# Copia a configuração personalizada
COPY nginx.conf /etc/nginx/nginx.conf

# Define usuário não-root como boa prática de segurança
USER nginx

# Expõe porta usada pelo Nginx
EXPOSE 80

# Comando para iniciar o servidor
CMD ["nginx", "-g", "daemon off;"]

