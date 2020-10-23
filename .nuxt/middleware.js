const middleware = {}

middleware['auth'] = require('../client/middleware/auth.js')
middleware['auth'] = middleware['auth'].default || middleware['auth']

middleware['check-auth'] = require('../client/middleware/check-auth.js')
middleware['check-auth'] = middleware['check-auth'].default || middleware['check-auth']

middleware['guest'] = require('../client/middleware/guest.js')
middleware['guest'] = middleware['guest'].default || middleware['guest']

middleware['locale'] = require('../client/middleware/locale.js')
middleware['locale'] = middleware['locale'].default || middleware['locale']

export default middleware
