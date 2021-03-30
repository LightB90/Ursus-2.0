module.exports = {
	globDirectory: 'public/',
	globPatterns: ['**/*.{js,css,png,jpg,svg,eot,ttf,woff,woff2}'],
	swSrc: 'public/sw-base.js',
	swDest: 'public/service-worker.js',
	globIgnores: [
		'../workbox-cli-config.js',
		'storage/**'
  ]
};