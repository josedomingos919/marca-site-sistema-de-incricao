const baseURL = 'http://localhost:8000/api'

/*Function*/
const getFormData = (form) => {
  const data = $(form).serializeArray()

  let result = {}

  data.forEach((e) => {
    result = { ...result, [e.name]: e.value }
  })

  return result
}

const user = {
  set(data) {
    localStorage.setItem('private', btoa(JSON.stringify(data)))
  },
  get() {
    try {
      return JSON.parse(atob(localStorage.getItem('private')))
    } catch {
      return {}
    }
  },
}

const redirect = {
  reload() {
    window.location.reload()
  },
  href(url) {
    window.location.href = url
  },
  replace(url) {
    window.location.replace(url)
  },
}

/*Valid Acess*/

const validateAcess = () => {
  if (!localStorage.getItem('private') && location.pathname !== '/login') {
    redirect.replace('/login')
    return
  } else {
  }
}

validateAcess()

const logOut = () => {
  localStorage.clear()
  redirect.replace('/login')
}

const clearForm = (formId) => {
  let obj = [...$(`#${formId} input`)].forEach((e) => (e.value = null))
  obj = [...$(`#${formId} select`)].forEach((e) => (e.selectedIndex = 0))
}

const beforeSend = () =>
  function (xhr) {
    xhr.setRequestHeader('Authorization', `Bearer ${user.get().token}`)
  }

//inicialize
$(document).ready(() => {
  displayUserData()
})

function displayUserData() {
  $('#id_user_name').text(user.get().user?.name)
  $('#id_user_acess').text(`-- ${user.get().user?.type} --`)
}

function formatData(data = '') {
  let srt = data.split('.')[0]
  srt = srt.split('T')

  return srt[0] + ' ' + srt[1]
}

function getTypePt(type) {
  return (
    {
      student: 'Estudante',
      professional: 'Profissional',
      associate: 'Associado',
    }[type] || ''
  )
}

function getStatusPt(key) {
  return (
    {
      pendding: 'Pedente',
      payed: 'Profissional',
      canceled: 'Cancelado',
    }[key] || ''
  )
}
