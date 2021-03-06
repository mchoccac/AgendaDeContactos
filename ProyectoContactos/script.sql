USE [Test]
GO
/****** Object:  Table [dbo].[Students]    Script Date: 3/10/2020 1:24:03 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Students](
	[iD] [int] IDENTITY(1,1) NOT NULL,
	[firstName] [nvarchar](max) NOT NULL,
	[lastName] [nvarchar](max) NOT NULL,
	[feesPaid] [int] NOT NULL,
	[gender] [nvarchar](max) NOT NULL,
	[emailId] [nvarchar](max) NOT NULL,
	[telephoneNumber] [nvarchar](max) NOT NULL,
	[dateOfBirth] [date] NOT NULL,
	[isActive] [bit] NOT NULL,
	[creationDate] [datetime] NOT NULL,
	[lastModifiedDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[iD] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  StoredProcedure [dbo].[sp_contacto_del]    Script Date: 3/10/2020 1:24:03 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[sp_contacto_del]
		   @id int
AS
BEGIN
DELETE FROM [dbo].[Students]
      WHERE id = @id
END
GO
/****** Object:  StoredProcedure [dbo].[sp_contacto_ins]    Script Date: 3/10/2020 1:24:03 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[sp_contacto_ins]
		   @firstName nvarchar(max),
           @lastName nvarchar(max),
           @feesPaid int,
           @gender nvarchar(max),
           @emailId nvarchar(max),
           @telephoneNumber nvarchar(max),
           @dateOfBirth date,
           @isActive bit
AS
BEGIN

INSERT INTO [dbo].[Students]
           ([firstName]
           ,[lastName]
           ,[feesPaid]
           ,[gender]
           ,[emailId]
           ,[telephoneNumber]
           ,[dateOfBirth]
           ,[isActive]
           ,[creationDate]
		   ,[lastModifiedDate]
		   
		   )
     VALUES
           (
		   @firstName,
		   @lastName, 
           @feesPaid,
		   @gender, 
           @emailId, 
           @telephoneNumber, 
           @dateOfBirth, 
		   @isActive,
           GETDATE(),
		   GETDATE()
		   )
END
GO
/****** Object:  StoredProcedure [dbo].[sp_contacto_upd]    Script Date: 3/10/2020 1:24:03 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[sp_contacto_upd]
		   @id int,	
		   @firstName nvarchar(max),
           @lastName nvarchar(max),
           @feesPaid int,
           @gender nvarchar(max),
           @emailId nvarchar(max),
           @telephoneNumber nvarchar(max),
           @dateOfBirth date,
           @isActive bit
AS
BEGIN
UPDATE [dbo].[Students]
   SET [firstName] = @firstName
      ,[lastName] = @lastName
      ,[feesPaid] = @feesPaid
      ,[gender] = @gender
      ,[emailId] = @emailId
      ,[telephoneNumber] = @telephoneNumber
      ,[dateOfBirth] = @dateOfBirth
      ,[isActive] = @isActive
      ,[lastModifiedDate] = GETDATE()
 WHERE id = @id
END
GO
/****** Object:  StoredProcedure [dbo].[sp_select_all_id]    Script Date: 3/10/2020 1:24:03 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
  
CREATE Procedure [dbo].[sp_select_all_id]  
	@id int
As   
Begin  
   Select * from Students where id=isnull(@id,id) 
End 
GO
