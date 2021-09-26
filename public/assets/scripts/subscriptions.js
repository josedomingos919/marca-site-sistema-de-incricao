var __curent_page = 1
var __search = ''

$(document).ready(() => {
  inicialize()

  $('#limitSelect').change((e) => {
    const value = +e.target.value
    inicialize(__curent_page, value, $('#limitSelect').val(), '&search')
  })
})

//250
let debounce = () => {}

$('#idSearh').keyup((e) => {
  clearTimeout(debounce)

  debounce = setTimeout(() => {
    __search = e?.target?.value || ''
    inicialize(__curent_page, $('#limitSelect').val())
  }, 250)
})

function inicialize(page = 1, limit = 5, params = '') {
  $.ajax({
    type: 'GET',
    url: `${baseURL}/subscriptions?page=${page}&limit=${limit}&search=${__search}${params}`,
    dataType: 'JSON',
    beforeSend: beforeSend(),
    success: (response) => {
      const { data = [], links = [], current_page = 1 } = response
      __curent_page = current_page
      console.log(response)

      $('#idTbody').html(
        data.map(
          ({ id, name, created_at, type, cpf, email }) => `
            <tr> 
                <td>${id}</td>
                <td>${name}</td>
                <td>${formatData(created_at)}</td>
                <td>${type}</td>
                <td>${cpf}</td>
                <td>${email}</td>
                <td></td>
                <td></td>
                <td></td> 
            </tr> 
      `,
        ),
      )

      $('#IdPage').html(
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
