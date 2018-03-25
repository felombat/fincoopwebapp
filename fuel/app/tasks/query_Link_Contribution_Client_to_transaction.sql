SELECT ct.id as 'contribution_id', tr.id as 'transaction_id' , ct.budget_id , ct.amount as deposit , concat(clients.first_name, ' ', clients.last_name) as client ,
  tr.to_account_id  , tr.amount as transfert , accounts.name FROM
  contributions ct LEFT JOIN clients ON ct.budget_id = clients.id ,
    transactions tr LEFT JOIN accounts ON tr.to_account_id = accounts.id
where ct.created_at = tr.created_at and ct.type = 'credit'

