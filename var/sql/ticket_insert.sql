/* create ticket */
INSERT INTO ticket (id, title, description, status, assignee, created_at, updated_at)
VALUES (:id, :title, :description, :status, :assignee, :created_at, :updated_at)
