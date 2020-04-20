const cards = document.querySelectorAll('.memory-card')
let hasFlipCard = false
let lockBord = false
let firstCard, secondCard

function flipCard() {
  if (lockBord) return //if lockboard is true
  // console.log(this);
  if (this === firstCard) return
  this.classList.toggle('flip')
  //classList.toggle => acess the classlist of the memory card and toggle => if the class is there remove it if its not add it
  if (!hasFlipCard) {
    //if hasflipcard is false

    //first time clicked card
    hasFlipCard = true
    firstCard = this
    //console.log(hasFlipCard, firstCard);
    return
  }
  secondCard = this
  checkMatch()
}
//imediate invoke function
(function shuffle() {
  cards.forEach(card => {
    //eslint-disable-next-line
    let randomPs = Math.floor(Math.random() * 12);
    // @ts-ignore
    card.style.order = randomPs
  })
})()

function resetBord() {
  [hasFlipCard, lockBord] = [false, false];
  [firstCard, secondCard] = [null, null]
}

function checkMatch() {
  //eslint-disable-next-line
  let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;
  //eslint-disable-next-line
  isMatch ? disableCards() : unflipCards();
}

function disableCards() {
  firstCard.removeEventListener('click', flipCard)
  secondCard.removeEventListener('click', flipCard)
  resetBord()
}

function unflipCards() {
  lockBord = true
  setTimeout(() => {
    firstCard.classList.remove('flip')
    secondCard.classList.remove('flip')
    resetBord()
  }, 1500)
}

cards.forEach(card => card.addEventListener('click', flipCard))
