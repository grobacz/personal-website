const { createProxyMiddleware } = require('http-proxy-middleware');

require('dotenv').config()

module.exports = function (app) {
    app.use(
        '/api',
        createProxyMiddleware({
            target: process.env.API_URL,
            changeOrigin: true,
            headers: { 'X-AUTH-TOKEN': process.env.API_KEY },
            pathRewrite: { '^/api': '' }
        })
    );
};