# /ticket

## GET

### Request
        
| Name  | Type  | Description | Default | Required | 
|-------|-------|-------------|---------|----------|          
| id | string |  |  |  Required 

### Response

* object [ticket.json](../schema/ticket.json)

| Name  | Type  | Description | Default | Required | Constrain |
|-------|-------|-------------|---------|----------|-----------| 
| id | string | The unique identifier for a ticket. |   |  Optional  |  |
| title | string | The title of the ticket |   |  Required  | minLength:3, maxLength:255 |
| description | string | The description of the ticket |   |  Required  | maxLength:255 |
| assignee | string | The assignee of the ticket |   |  Optional  | maxLength:255 |
| status | string | The name of the status |   |  Required  | maxLength:255 |
| created_at | string | The date and time that the ticket was created |   |  Required  | format:datetime |
| updated_at | string | The date and time that the ticket was last modified |   |  Required  | format:datetime |

