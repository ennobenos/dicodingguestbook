create table [dbo].[guest](
    id INT NOT NULL IDENTITY(1,1) PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    mobilenumber VARCHAR(30),
    comment VARCHAR(100)
);
