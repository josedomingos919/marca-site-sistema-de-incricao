$(document).ready(() => {
  $('form').submit(function (event) {
    const data = getFormData(this)

    event.preventDefault()

    $.ajax({
      type: 'POST',
      url: `${baseURL}/login`,
      data,
      success: (response) => {
        user.set(response)
        redirect.replace('/dashboard')
      },
      error: () => {
        alert('Não autorizado!')
      },
      dataType: 'JSON',
    })
  })
})
