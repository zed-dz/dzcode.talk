/* JavaScript code for a simple game*/

let scores
let roundScores
let activePlayer
let gamePlaying = true

frish()

// Document.querySelector('#current-0').textContent=dice;

// var another =document.querySelector('#score-0').textContent;
function frish() {
  gamePlaying = true
  scores = [0, 0]
  roundScores = 0
  activePlayer = 0
  document.querySelector('.dice').style.display = 'none'

  document.querySelector('#score-0').textContent = 0
  document.querySelector('#score-1').textContent = 0
  document.querySelector('#current-0').textContent = 0
  document.querySelector('#current-1').textContent = 0
  document.querySelector('#name-0').textContent = 'PLAYER 1'
  document.querySelector('#name-1').textContent = 'PLAYER 2'
  document.querySelector('.player-0-panel').classList.remove('winner')
  document.querySelector('.player-1-panel').classList.remove('winner')

  document.querySelector('.player-0-panel').classList.remove('active')
  document.querySelector('.player-1-panel').classList.remove('active')
  document.querySelector('.player-0-panel').classList.add('active')
}

frish()
// Document.querySelector('.player-'+activePlayer+'-panel').classList.remove('winner');
document.querySelector('.btn-roll').addEventListener('click', () => {
  if (gamePlaying) {
    const dice = Math.floor(Math.random() * 6) + 1
    const diceDom = document.querySelector('.dice')
    diceDom.style.display = 'block'
    diceDom.src = `images/dice-${dice}.png`

    if (dice !== 1) {
      roundScores += dice
      document.querySelector(
        `#current-${activePlayer}`
      ).textContent = roundScores
    } else {
      nextPlayer()
      // Document.querySelector('.dice').style.display='none';
      // document.querySelector('.player-0-panel').classList.remove('active');
      // document.querySelector('.player-1-panel').classList.add('active');
    }
  }
})

document.querySelector('.btn-hold').addEventListener('click', () => {
  if (gamePlaying) {
    scores[activePlayer] += roundScores
    document.querySelector(`#score-${activePlayer}`).textContent =
      scores[activePlayer]
    roundScores = 0
    if (scores[activePlayer] >= 100) {
      document.querySelector(`#name-${activePlayer}`).textContent = 'winner!'
      document.querySelector('.dice').style.display = 'none'
      document
        .querySelector(`.player-${activePlayer}-panel`)
        .classList.add('winner')
      document
        .querySelector(`.player-${activePlayer}-panel`)
        .classList.remove('active')
      gamePlaying = false
    }

    nextPlayer()
  }
})

function nextPlayer() {
  activePlayer === 0 ? (activePlayer = 1) : (activePlayer = 0)
  roundScores = 0

  document.querySelector('#current-0').textContent = 0
  document.querySelector('#current-1').textContent = 0

  document.querySelector('.player-0-panel').classList.toggle('active')
  document.querySelector('.player-1-panel').classList.toggle('active')
  document.querySelector('.dice').style.display = 'none'
}

document.querySelector('.btn-new').addEventListener('click', () => {
  frish()
})
