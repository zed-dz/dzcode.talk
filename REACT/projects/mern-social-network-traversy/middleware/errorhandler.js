module.exports = {
  handleFunctionErrors: fn => (...params) => fn(...params).catch(console.error),

  handleExpressErrors: fn => async (req, res, next) =>
    fn(req, res, next).catch(next),

  displayErrors: async (err, req, res, next) => {
    console.error(`error : ${err.message} \n http code : ${err.status}`)
    if (err.kind === 'ObjectId') return
    res.status(err.status).json({ err, error: err.message })
    res.status(500).send('Server Error')
    return next(err)
  },

  unhandleRejection: () =>
    process.on('unhandledRejection', error => {
      console.error('unhandledRejection', error)
    })
}
