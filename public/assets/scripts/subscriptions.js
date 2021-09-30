var __curent_page = 1

$(document).ready(() => {
  inicialize()

  $('#limitSelect').change(() => {
    inicialize(1, $('#limitSelect').val())
  })

  $('#idCategoriType').change(() => {
    inicialize(1, $('#limitSelect').val())
  })
})

//250
let debounce = () => {}

$('#idSearh').keyup(() => {
  clearTimeout(debounce)
  debounce = setTimeout(() => {
    inicialize(1, $('#limitSelect').val())
  }, 250)
})

function inicialize(page = 1, limit = 5, params = '') {
  const url = `${baseURL}/subscriptions?page=${page}&limit=${limit}&search=${$(
    '#idSearh',
  ).val()}&types=${$('#idCategoriType').val()}${params}`

  console.log(url)

  $.ajax({
    type: 'GET',
    url: url,
    dataType: 'JSON',
    beforeSend: beforeSend(),
    success: (response) => {
      const { data = [], links = [], current_page = 1 } = response
      __curent_page = current_page
      console.log(response)

      $('#idTbody').html(
        data.map(
          ({ id, name, created_at, type, cpf, email, status }) => `
            <tr> 
                <td>${id}</td>
                <td>${name}</td>
                <td>${formatData(created_at)}</td>
                <td>${getTypePt(type)}</td>
                <td>${cpf}</td>
                <td>${email}</td>
                <td>${getStatusPt(status)}</td>
                <td>R$ 00,00</td>
                <td class="options-table">
                    <label onclick="onEdit(${id})" >Editar</label>
                    <label onclick="onDelete(${id})" >Eliminar</label>
                </td> 
            </tr> 
      `,
        ),
      )

      $('#IdPage').html(
        links.length > 3 &&
          links.map(
            ({ label, url, active }) => `
            <div class="page-link ${active ? 'active' : ''} "  
                ${
                  url
                    ? `   onClick="inicialize(${
                        url ? url.split('=')[1] : label
                      }, '${$('#limitSelect').val()}', '' )"  `
                    : ''
                }
            > ${label} </div>
      `,
          ),
      )
    },
    error: () => {
      alert('Não autorizado!')
    },
  })
}

function onEdit(id) {
  redirect.href(`/dashboard?id=${id}`)
}

function onDelete(id) {
  $.ajax({
    type: 'DELETE',
    url: `${baseURL}/subscriptions/${id}`,
    dataType: 'JSON',
    beforeSend: beforeSend(),
    success: (response) => {
      console.log(response)
      redirect.reload()
    },
    error: () => {
      alert('Não autorizado!')
    },
  })
}
