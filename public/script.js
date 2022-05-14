

const rows = document.querySelectorAll('#row')
console.log(rows)

rows.forEach((r)=>
r.addEventListener('click',(event)=>{
   console.log(event.currentTarget.classList.toggle('highlight'))
}))