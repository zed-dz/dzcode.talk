export default function DisplayErrors(errors) {
  const div = document.querySelectorAll('.invalid-feedback')
  for (let i = 0; i <= errors.length; i++) {
    const arr = Array.from(div)
    for (let j = 0; j <= arr.length; j++) {
      if (errors[0].param === 'name') {
        document.getElementById('firstinput').classList.add('is-invalid')
        arr[0].innerHTML = errors[0].msg
        break
      } else {
        arr[0].innerHTML = ''
        document.getElementById('firstinput').classList.add('is-valid')
      }
      if (errors[0].param === 'email') {
        document.getElementById('secondinput').classList.add('is-invalid')
        arr[1].innerHTML = errors[0].msg
        break
      } else {
        arr[1].innerHTML = ''
        document.getElementById('secondinput').classList.add('is-valid')
      }
      if (errors[0].param === 'password') {
        arr[2].innerHTML = errors[0].msg
        document.getElementById('thirdinput').classList.add('is-invalid')
        break
      } else {
        arr[2].innerHTML = ''
        document.getElementById('thirdinput').classList.add('is-valid')
      }
    }
  }
}
