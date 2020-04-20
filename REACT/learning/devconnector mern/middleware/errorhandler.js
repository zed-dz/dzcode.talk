module.exports = {
  handleFunctionErrors: fn => (...params) => fn(...params).catch(console.error),

  // handle specific errors like syntax errs or what we throw at it with next
  handleExpressErrors: fn => async (req, res, next) =>
    fn(req, res, next).catch(next),

  // this is a middleware global function that will check for any global erros
  displayErrors: async (err, req, res, next) => {
    // console.log(err)
    console.error(`error : ${err.message} \n http code : ${err.status}`)
    if (err.kind === 'ObjectId') return
    res.status(err.status).json({ err, error: err.message })
    res.status(500).send('Server Error')
    // res.status(500).json({ msg: 'Server Error' })
    return next(err)

    // res
    //   .status(err.status || 500)
    //   .json({ ErrorName: err.message, Error: err, http: err.status || 500 })
    // The res.render stuff will throw an error if you're not using a view engine.
    // res.render('error', { error: err })
  },
  // if anything comes wrong to our aplication nodejs will crash the app with an unhandlerejection error
  unhandleRejection: () =>
    process.on('unhandledRejection', error => {
      console.error('unhandledRejection', error)
    })
}

/*


//  ERROR HANDLING WITH WES BOS ASYNC AWAIT

// using catch out side the function
 go().catch(e => console.error(e));

// create a custom function to check for errors without a try and catch block

// make a function to handle that error
function handleError(fn) {
  return function (...params) {
    return fn(...params).catch(function (err) {
       // do something with the error!
      console.error(`Oops!`, err);
    });
  }
}

// Wrap it in a HOC

const handleError = fn => (...params) => fn(...params).catch(console.error)
const safeVerif = handleError(passportVerif)
// module.exports = safeVerif
safeYolo();

  // Start with a regular Route where an error could happen
    const getOrders = async (req, res, next) => {
      const orders = Orders.find({ email: req.user.email });
      // Something Goes Wrong
      if (!orders.length) throw Error('No Orders Found');
    }
    const getOrders = async (req, res, next) => {
      const orders = Orders.find({ email: req.user.email });
      // Something Goes Wrong
      if (!orders.length) next('No Orders Found!');
    }
    // passes this along to the next middleware function
    // Since this unhandled, this route would case the app to quit
    router.get('/orders', catchErrors(getOrders));
    const displayErrors = async (error, req, res, next) => {
      res.status(err.status || 500);
      res.render('error', { error });
    }
    // any time we call next('Something Happened') displayErrors will kick in
    app.use(displayErrors);
    const catchErrors = (fn) => {
      return function (req, res, next) {
        return fn(req, res, next).catch(next);
      };
    };
    // or Hot Shot
    const catchErrors = (fn) =>
      (req, res, next) => fn(req, res, next).catch(next)
    async function loadData() {
      const wes = await axios.get('...');
    }
    loadData.catch(dealWithErrors);
    process.on('unhandledRejection', error => {
      console.log('unhandledRejection', error);
    });
*/

/*

// The res.render stuff will throw an error if you're not using a view engine.

If you just want to serve json replace the res.render('error', { error: err }); lines in your code with:

res.json({ error: err })
PS: People usually also have message in the returned object:

res.status(err.status || 500);
res.json({
  message: err.message,
  error: err
});
    */
