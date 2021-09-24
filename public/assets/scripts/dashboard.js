$(document).ready(() => {
  $('#btn_cancel').click((e) => {
    e.preventDefault()
    clearForm('')
  })

  $('#frm').submit(function (event) {
    const data = getFormData(this)

    console.log(data)
    event.preventDefault()

    $.ajax({
      type: 'POST',
      url: `${baseURL}/subscription`,
      data,
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', `Bearer ${user.get().token}`)
      },
      success: (response) => {
        console.log(response)
        alert('Inscrição realizada com sucesso!')
        redirect.reload()
      },
      error: (response) => {
        console.log(response)

        if (response?.responseJSON?.errors?.email)
          alert('Verifique o email, provavelmente já se encontra em uso!')

        if (response?.responseJSON?.errors?.password)
          alert('Verifique a senha, tenta certificar que as 2 são iguais!')
      },
      dataType: 'JSON',
    })
  })
})
