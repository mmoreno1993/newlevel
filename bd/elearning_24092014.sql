USE [master]
GO
/****** Object:  Database [ELEARNING]    Script Date: 24/09/2014 04:30:56 p.m. ******/
CREATE DATABASE [ELEARNING]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'ELEARNING', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\ELEARNING.mdf' , SIZE = 4160KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'ELEARNING_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\ELEARNING_log.ldf' , SIZE = 1040KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [ELEARNING] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [ELEARNING].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [ELEARNING] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [ELEARNING] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [ELEARNING] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [ELEARNING] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [ELEARNING] SET ARITHABORT OFF 
GO
ALTER DATABASE [ELEARNING] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [ELEARNING] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [ELEARNING] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [ELEARNING] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [ELEARNING] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [ELEARNING] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [ELEARNING] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [ELEARNING] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [ELEARNING] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [ELEARNING] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [ELEARNING] SET  ENABLE_BROKER 
GO
ALTER DATABASE [ELEARNING] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [ELEARNING] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [ELEARNING] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [ELEARNING] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [ELEARNING] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [ELEARNING] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [ELEARNING] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [ELEARNING] SET RECOVERY FULL 
GO
ALTER DATABASE [ELEARNING] SET  MULTI_USER 
GO
ALTER DATABASE [ELEARNING] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [ELEARNING] SET DB_CHAINING OFF 
GO
ALTER DATABASE [ELEARNING] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [ELEARNING] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [ELEARNING]
GO
/****** Object:  Table [dbo].[tbl_administrador]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_administrador](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_persona_id] [int] NULL,
	[nombre] [varchar](50) NULL,
	[clave] [varchar](20) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_administrador] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_caso]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_caso](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_tema_id] [int] NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_caso] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_contrato]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_contrato](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[titulo] [varchar](100) NULL,
	[cuerpo] [varchar](4000) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_contrato] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_curso]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_curso](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_modulos_id] [int] NULL,
	[descripcion] [varchar](150) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_curso] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_expositor]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_expositor](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NULL,
	[apellido_pat] [varchar](70) NULL,
	[apellido_mat] [varchar](70) NULL,
	[direccion] [varchar](200) NULL,
	[telefono] [varchar](20) NULL,
	[correo] [varchar](100) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_expositor] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_historial_avance]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_historial_avance](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_tema_id] [int] NULL,
	[tbl_usuario_id] [int] NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_historial_avance] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_historial_nota]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_historial_nota](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_curso_id] [int] NULL,
	[tbl_usuario_id] [int] NULL,
	[nota] [numeric](3, 2) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_historial_nota] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_mensaje]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_mensaje](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_usuario_id] [int] NOT NULL,
	[tbl_administrador_id] [int] NOT NULL,
	[respuesta] [bit] NOT NULL,
	[mensaje] [varchar](4000) NULL,
	[visto] [bit] NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_mensaje] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_nivel]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_nivel](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](100) NULL,
	[icono] [varchar](200) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_nivel] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_perfil]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_perfil](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](50) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_perfil] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_persona]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_persona](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](120) NULL,
	[apellido_pat] [varchar](70) NULL,
	[apellido_mat] [varchar](70) NULL,
	[direccion] [varchar](200) NULL,
	[telefono] [varchar](20) NULL,
	[correo] [varchar](100) NULL,
	[foto] [varchar](200) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_persona] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_planaprendizaje]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_planaprendizaje](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_usuario_id] [int] NULL,
	[tbl_curso_id] [int] NULL,
	[creado_por] [datetime] NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_planaprendizaje] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_tema]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_tema](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_curso_id] [int] NULL,
	[tbl_expositor_id] [int] NULL,
	[orden] [int] NULL,
	[descripcion] [varchar](100) NULL,
	[video] [varchar](200) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
	[video_caso] [varchar](200) NULL,
 CONSTRAINT [PK_tbl_clase] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_testdetalle]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_testdetalle](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_curso_id] [int] NULL,
	[descripcion] [varchar](200) NULL,
	[orden] [int] NOT NULL,
	[multiple] [bit] NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_testdetalle] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_testdetalle_respuesta]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_testdetalle_respuesta](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_testdetalle_id] [int] NULL,
	[respuesta] [varchar](200) NULL,
	[orden] [int] NULL,
	[verdadero] [bit] NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
	[modificado_por] [varchar](50) NULL,
 CONSTRAINT [PK_tbl_testdetalle_respuesta] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_usuario]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_perfil_id] [int] NULL,
	[tbl_persona_id] [int] NULL,
	[tbl_nivel_id] [int] NULL,
	[tbl_clientes_id] [int] NULL,
	[nombre] [varchar](50) NULL,
	[clave] [varchar](20) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL,
 CONSTRAINT [PK_tbl_usuario] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tmp]    Script Date: 24/09/2014 04:30:56 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tmp](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tbl_curso_id] [int] NOT NULL,
	[descripcion] [varchar](100) NULL,
	[creado_por] [varchar](50) NULL,
	[fecha_creado] [datetime] NULL,
	[fecha_modificado] [datetime] NULL,
	[estado] [bit] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_administrador] ON 

INSERT [dbo].[tbl_administrador] ([id], [tbl_persona_id], [nombre], [clave], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, 1, N'mmoreno@starsoft.com.pe', N'moisess', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3B0010F806C AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_administrador] ([id], [tbl_persona_id], [nombre], [clave], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (3, 3, N'cvallejos@starsoft.com.pe', N'123', N'Moisés Moreno', CAST(0x0000A3B000BDD5E4 AS DateTime), CAST(0x0000A3B0010FADBE AS DateTime), 1, N'Moisés Moreno')
SET IDENTITY_INSERT [dbo].[tbl_administrador] OFF
SET IDENTITY_INSERT [dbo].[tbl_curso] ON 

INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, 2, N'Compras', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AB00F59C0C AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (2, 4, N'Facturación', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AC00C8786B AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (3, 3, N'Cuentas por Cobrar', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AE00F4157E AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (4, 5, N'Cuentas por pagar', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00DA80B4 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (5, 10, N'Importaciones', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00DA88F4 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (6, 12, N'Inventarios', N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), CAST(0x0000A3AE01033DC2 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (7, NULL, N'Contabilidad', N'Moisés Moreno', CAST(0x0000A3A800000000 AS DateTime), CAST(0x0000A3AF00DACEA0 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (8, NULL, N'Flujo Caja', N'Moisés Moreno', CAST(0x0000A3A800000000 AS DateTime), CAST(0x0000A3AC00BDF5FD AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (9, NULL, N'Caja y Bancos', N'Moisés Moreno', CAST(0x0000A3A800000000 AS DateTime), CAST(0x0000A3AC00BDC7A7 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_curso] ([id], [tbl_modulos_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (55, NULL, N'nuevo curso', N'Moisés Moreno', CAST(0x0000A3AF00F04305 AS DateTime), NULL, 0, NULL)
SET IDENTITY_INSERT [dbo].[tbl_curso] OFF
SET IDENTITY_INSERT [dbo].[tbl_expositor] ON 

INSERT [dbo].[tbl_expositor] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, N'José', N'Díaz', N'', NULL, N'991043422', N'jdiaz@starsoft.com.pe', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00E70F89 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_expositor] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (2, N'Saúl', N'Palomino', N'', NULL, N'991043422', N'spalomino@starsoft.com.pe', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00E72E07 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_expositor] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (3, N'Yvan', N'Ampuero', N'', NULL, N'991043422', N'yampuero@starsoft.com.pe', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00E7041A AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_expositor] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (4, N'Elizabeth', N'Palermo', N'Tamariz', NULL, N'991043422', N'epalermo@starsoft.com.pe', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AF00F02CD9 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_expositor] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (7, N'Cesar', N'Vallejos', N'', NULL, NULL, N'cgvallejos@hotmail.com', N'Moisés Moreno', CAST(0x0000A3AF00EEDA0B AS DateTime), CAST(0x0000A3AF00EF19D1 AS DateTime), 1, N'Moisés Moreno')
SET IDENTITY_INSERT [dbo].[tbl_expositor] OFF
SET IDENTITY_INSERT [dbo].[tbl_historial_avance] ON 

INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (1, 1, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (2, 2, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (3, 3, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (4, 4, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (5, 5, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (6, 6, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
INSERT [dbo].[tbl_historial_avance] ([id], [tbl_tema_id], [tbl_usuario_id], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (7, 7, 1, N'Moisés Moreno', CAST(0x0000A3A000000000 AS DateTime), NULL, 1)
SET IDENTITY_INSERT [dbo].[tbl_historial_avance] OFF
SET IDENTITY_INSERT [dbo].[tbl_nivel] ON 

INSERT [dbo].[tbl_nivel] ([id], [descripcion], [icono], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (1, N'Bronze', N'img/icon/bronze.png', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tbl_nivel] ([id], [descripcion], [icono], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (2, N'Plata', N'img/icon/plata.png', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tbl_nivel] ([id], [descripcion], [icono], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (3, N'Oro', N'img/icon/oro.png', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[tbl_nivel] OFF
SET IDENTITY_INSERT [dbo].[tbl_perfil] ON 

INSERT [dbo].[tbl_perfil] ([id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (1, N'Administrador', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tbl_perfil] ([id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (2, N'Operador', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[tbl_perfil] OFF
SET IDENTITY_INSERT [dbo].[tbl_persona] ON 

INSERT [dbo].[tbl_persona] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [foto], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, N'Moisés', N'Moreno', N'Usnayo', N'Jr. Valladares N10', N'991043422', N'mmoreno@starsoft.com.pe', N'b346789fdcd2.jpg', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3B0010F806C AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_persona] ([id], [nombre], [apellido_pat], [apellido_mat], [direccion], [telefono], [correo], [foto], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (3, N'Cesar', N'Vallejoss', N'', N'asd', N'fdfd', N'cvallejos@starsoft.com.pe', N'a127e6e8d47e.jpg', N'Moisés Moreno', CAST(0x0000A3B000BDD5E4 AS DateTime), CAST(0x0000A3B0010F7C4F AS DateTime), 1, N'Moisés Moreno')
SET IDENTITY_INSERT [dbo].[tbl_persona] OFF
SET IDENTITY_INSERT [dbo].[tbl_tema] ON 

INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1, 1, 1, 1, N'Ingreso de Ordenes de Compra', N'j2943', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AB010F9A39 AS DateTime), 1, N'Moisés Moreno', N'fu84298')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (2, 1, 1, 2, N'Ingreso de orden de compra por servicios', N'ord8476743.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AB00F89DA6 AS DateTime), 1, N'Moisés Moreno', NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (3, 1, 1, 3, N'Guías de Compra y Servicio', N'gui8547376.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AB00F89DA6 AS DateTime), 1, N'Moisés Moreno', NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (4, 1, 1, 4, N'Factura de compra con guía', N'fact04865746.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AB00F89DA7 AS DateTime), 1, N'Moisés Moreno', NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (5, 1, 1, 5, N'Factura de compra sin guía', N'fact094583762.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AC00B2A94B AS DateTime), 0, N'Moisés Moreno', N'ejemplo.mp4')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (6, 2, 1, 1, N'Registrar, Modificar, Eliminar Clientes', N'reg8472376.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL, NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (7, 2, 1, 2, N'Registrar, Modificar, Eliminar Artículos', N'reg957356.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL, NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (8, 2, 1, 3, N'Control de stock por artículo', N'con94377563.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL, NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (9, 2, 1, 4, N'Registro de facturas', N'reg727635.mp4', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL, NULL)
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1014, 6, 1, 1, N'Tema 1', N'video1', N'Moisés Moreno', CAST(0x0000A3AC00A9EE2E AS DateTime), NULL, 1, NULL, N'video2')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1018, 9, 1, 1, N'tema1', N'tema1', N'Moisés Moreno', CAST(0x0000A3AC00BC6A3E AS DateTime), NULL, 1, NULL, N'tema1')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1019, 8, 1, 1, N'tema1', N'tema1', N'Moisés Moreno', CAST(0x0000A3AC00BDEAFB AS DateTime), NULL, 1, NULL, N'tema1')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1020, 3, 3, 1, N'tema', N'tema', N'Moisés Moreno', CAST(0x0000A3AC00C8CA5E AS DateTime), NULL, 1, NULL, N'tema')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1021, 5, 1, 1, N'Tema 1', N'tema 1', N'Moisés Moreno', CAST(0x0000A3AE00AACB88 AS DateTime), NULL, 1, NULL, N'tema 1')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1023, 3, 3, 2, N'tema1', N'tema1', N'Moisés Moreno', CAST(0x0000A3AE00F4BA79 AS DateTime), CAST(0x0000A3AE00F4CCAB AS DateTime), 0, N'Moisés Moreno', N'tema1')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1024, 3, 3, 3, N'tema2', N'tema2', N'Moisés Moreno', CAST(0x0000A3AE00F4C576 AS DateTime), CAST(0x0000A3AE00F4CCAB AS DateTime), 0, N'Moisés Moreno', N'tema2')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1025, 4, 1, 1, N'Tema 1', N'1', N'Moisés Moreno', CAST(0x0000A3AE0112BACF AS DateTime), NULL, 1, NULL, N'1')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1029, 7, 2, 1, N'tema ejemplo', N'1', N'Moisés Moreno', CAST(0x0000A3AF00DAC238 AS DateTime), NULL, 1, NULL, N'2')
INSERT [dbo].[tbl_tema] ([id], [tbl_curso_id], [tbl_expositor_id], [orden], [descripcion], [video], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por], [video_caso]) VALUES (1030, 55, 7, 1, N'x', N'x', N'Moisés Moreno', CAST(0x0000A3AF00F05F02 AS DateTime), NULL, 1, NULL, N'x')
SET IDENTITY_INSERT [dbo].[tbl_tema] OFF
SET IDENTITY_INSERT [dbo].[tbl_testdetalle] ON 

INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, 1, N'¿Primera Pregunta?', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AE00C8764F AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (4, 1, N'¿Cuarta Pregunta?', 4, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AE00AA6D55 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (5, 1, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AE00C87E0A AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (6, 2, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (7, 2, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (8, 2, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (9, 2, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (10, 2, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (11, 3, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (12, 3, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (13, 3, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (14, 3, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (15, 3, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (16, 4, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (17, 4, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (18, 4, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (19, 4, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (20, 4, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (21, 5, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (22, 5, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (23, 5, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (24, 5, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (25, 5, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (26, 6, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (27, 6, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (28, 6, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (29, 6, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (30, 6, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (31, 7, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (32, 7, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (33, 7, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (34, 7, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (35, 7, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (36, 8, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (37, 8, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (38, 8, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (39, 8, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (40, 8, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (41, 9, N'¿Primera Pregunta?', 1, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (42, 9, N'¿Segunda Pregunta?', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (43, 9, N'¿Tercera Pregunta?', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (44, 9, N'¿Cuarta Pregunta?', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (45, 9, N'¿Quinta Pregunta?', 5, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle] ([id], [tbl_curso_id], [descripcion], [orden], [multiple], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (53, 55, N'pregunta', 1, 0, N'Moisés Moreno', CAST(0x0000A3AF00F9C2BF AS DateTime), NULL, 1, NULL)
SET IDENTITY_INSERT [dbo].[tbl_testdetalle] OFF
SET IDENTITY_INSERT [dbo].[tbl_testdetalle_respuesta] ON 

INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (1, 1, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (2, 1, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (3, 1, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (4, 1, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (13, 4, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (14, 4, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (15, 4, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (16, 4, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (17, 5, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (18, 5, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (19, 5, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (20, 5, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (21, 6, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (22, 6, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (23, 6, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (24, 6, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (25, 7, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (26, 7, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (27, 7, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (28, 7, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (29, 8, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (30, 8, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (31, 8, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (32, 8, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (33, 9, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (34, 9, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (35, 9, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (36, 9, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (37, 10, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (38, 10, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (39, 10, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (40, 10, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (41, 11, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (42, 11, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (43, 11, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (44, 11, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (45, 12, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (46, 12, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (47, 12, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (48, 12, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (49, 13, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (50, 13, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (51, 13, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (52, 13, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (53, 14, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (54, 14, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (55, 14, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (56, 14, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (57, 15, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (58, 15, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (59, 15, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (60, 15, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (61, 16, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A3AE0112ABE9 AS DateTime), 1, N'Moisés Moreno')
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (62, 16, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (63, 16, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (64, 16, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (65, 17, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (66, 17, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (67, 17, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (68, 17, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (69, 18, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (70, 18, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (71, 18, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (72, 18, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (73, 19, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (74, 19, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (75, 19, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (76, 19, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (77, 20, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (78, 20, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (79, 20, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (80, 20, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (81, 21, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (82, 21, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (83, 21, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (84, 21, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (85, 22, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (86, 22, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (87, 22, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (88, 22, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (89, 23, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (90, 23, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (91, 23, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (92, 23, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (93, 24, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (94, 24, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (95, 24, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (96, 24, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (97, 25, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (98, 25, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (99, 25, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (101, 26, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (102, 26, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (103, 26, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (104, 26, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (105, 27, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (106, 27, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (107, 27, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (108, 27, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
GO
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (109, 28, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (110, 28, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (111, 28, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (112, 28, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (113, 29, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (114, 29, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (115, 29, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (116, 29, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (117, 30, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (118, 30, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (119, 30, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (120, 30, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (121, 31, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (122, 31, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (123, 31, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (124, 31, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (125, 32, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (126, 32, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (127, 32, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (128, 32, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (129, 33, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (130, 33, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (131, 33, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (132, 33, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (133, 34, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (134, 34, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (135, 34, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (136, 34, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (137, 35, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (138, 35, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (139, 35, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (140, 35, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (141, 36, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (142, 36, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (143, 36, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (144, 36, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (145, 37, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (146, 37, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (147, 37, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (148, 37, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (149, 38, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (150, 38, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (151, 38, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (152, 38, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (153, 39, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (154, 39, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (155, 39, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (156, 39, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (157, 40, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (158, 40, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (159, 40, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (160, 40, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (161, 41, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (162, 41, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (163, 41, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (164, 41, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (165, 42, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (166, 42, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (167, 42, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (168, 42, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (169, 43, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (170, 43, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (171, 43, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (172, 43, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (173, 44, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (174, 44, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (175, 44, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (176, 44, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (177, 45, N'Respuesta 1', 1, 1, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (178, 45, N'Respuesta 2', 2, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (179, 45, N'Respuesta 3', 3, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (180, 45, N'Respuesta 4', 4, 0, N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (181, 13, N'a', 1, 0, N'Moisés Moreno', CAST(0x0000A3AE00FE8842 AS DateTime), NULL, 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (190, 53, N'respuesta', 1, 0, N'Moisés Moreno', CAST(0x0000A3AF00F9CA09 AS DateTime), NULL, 1, NULL)
INSERT [dbo].[tbl_testdetalle_respuesta] ([id], [tbl_testdetalle_id], [respuesta], [orden], [verdadero], [creado_por], [fecha_creado], [fecha_modificado], [estado], [modificado_por]) VALUES (191, 53, N'respuesta', 2, 0, N'Moisés Moreno', CAST(0x0000A3AF00F9D1D4 AS DateTime), NULL, 1, NULL)
SET IDENTITY_INSERT [dbo].[tbl_testdetalle_respuesta] OFF
SET IDENTITY_INSERT [dbo].[tbl_usuario] ON 

INSERT [dbo].[tbl_usuario] ([id], [tbl_perfil_id], [tbl_persona_id], [tbl_nivel_id], [tbl_clientes_id], [nombre], [clave], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (1, 1, 1, 1, 956, N'mmoreno@starsoft.com.pe', N'moisess', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[tbl_usuario] OFF
SET IDENTITY_INSERT [dbo].[tmp] ON 

INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (1, 1, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (2, 2, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (3, 3, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (4, 4, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (5, 5, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (6, 6, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (7, 7, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (8, 8, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
INSERT [dbo].[tmp] ([id], [tbl_curso_id], [descripcion], [creado_por], [fecha_creado], [fecha_modificado], [estado]) VALUES (9, 9, N'-', N'Moisés Moreno', CAST(0x0000A38B00000000 AS DateTime), CAST(0x0000A38B00000000 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[tmp] OFF
ALTER TABLE [dbo].[tbl_administrador]  WITH CHECK ADD  CONSTRAINT [FK_TBL_ADMINISTRADOR] FOREIGN KEY([tbl_persona_id])
REFERENCES [dbo].[tbl_persona] ([id])
GO
ALTER TABLE [dbo].[tbl_administrador] CHECK CONSTRAINT [FK_TBL_ADMINISTRADOR]
GO
ALTER TABLE [dbo].[tbl_caso]  WITH CHECK ADD  CONSTRAINT [fk_tbl_caso_1] FOREIGN KEY([tbl_tema_id])
REFERENCES [dbo].[tbl_tema] ([id])
GO
ALTER TABLE [dbo].[tbl_caso] CHECK CONSTRAINT [fk_tbl_caso_1]
GO
ALTER TABLE [dbo].[tbl_historial_avance]  WITH CHECK ADD  CONSTRAINT [FK_TBL_HISTORIAL_AVANCE_1] FOREIGN KEY([tbl_tema_id])
REFERENCES [dbo].[tbl_tema] ([id])
GO
ALTER TABLE [dbo].[tbl_historial_avance] CHECK CONSTRAINT [FK_TBL_HISTORIAL_AVANCE_1]
GO
ALTER TABLE [dbo].[tbl_historial_avance]  WITH CHECK ADD  CONSTRAINT [FK_TBL_HISTORIAL_AVANCE_2] FOREIGN KEY([tbl_usuario_id])
REFERENCES [dbo].[tbl_usuario] ([id])
GO
ALTER TABLE [dbo].[tbl_historial_avance] CHECK CONSTRAINT [FK_TBL_HISTORIAL_AVANCE_2]
GO
ALTER TABLE [dbo].[tbl_historial_nota]  WITH CHECK ADD  CONSTRAINT [fk_tbl_historial_nota_1] FOREIGN KEY([tbl_curso_id])
REFERENCES [dbo].[tbl_curso] ([id])
GO
ALTER TABLE [dbo].[tbl_historial_nota] CHECK CONSTRAINT [fk_tbl_historial_nota_1]
GO
ALTER TABLE [dbo].[tbl_historial_nota]  WITH CHECK ADD  CONSTRAINT [FK_TBL_HISTORIAL_NOTA_2] FOREIGN KEY([tbl_usuario_id])
REFERENCES [dbo].[tbl_usuario] ([id])
GO
ALTER TABLE [dbo].[tbl_historial_nota] CHECK CONSTRAINT [FK_TBL_HISTORIAL_NOTA_2]
GO
ALTER TABLE [dbo].[tbl_mensaje]  WITH CHECK ADD  CONSTRAINT [fk_tbl_mensaje_1] FOREIGN KEY([tbl_usuario_id])
REFERENCES [dbo].[tbl_usuario] ([id])
GO
ALTER TABLE [dbo].[tbl_mensaje] CHECK CONSTRAINT [fk_tbl_mensaje_1]
GO
ALTER TABLE [dbo].[tbl_mensaje]  WITH CHECK ADD  CONSTRAINT [fk_tbl_mensaje_2] FOREIGN KEY([tbl_administrador_id])
REFERENCES [dbo].[tbl_administrador] ([id])
GO
ALTER TABLE [dbo].[tbl_mensaje] CHECK CONSTRAINT [fk_tbl_mensaje_2]
GO
ALTER TABLE [dbo].[tbl_planaprendizaje]  WITH CHECK ADD  CONSTRAINT [fk_tbl_aprendizaje_1] FOREIGN KEY([tbl_usuario_id])
REFERENCES [dbo].[tbl_usuario] ([id])
GO
ALTER TABLE [dbo].[tbl_planaprendizaje] CHECK CONSTRAINT [fk_tbl_aprendizaje_1]
GO
ALTER TABLE [dbo].[tbl_planaprendizaje]  WITH CHECK ADD  CONSTRAINT [fk_tbl_aprendizaje_2] FOREIGN KEY([tbl_curso_id])
REFERENCES [dbo].[tbl_curso] ([id])
GO
ALTER TABLE [dbo].[tbl_planaprendizaje] CHECK CONSTRAINT [fk_tbl_aprendizaje_2]
GO
ALTER TABLE [dbo].[tbl_tema]  WITH CHECK ADD  CONSTRAINT [FK_TBL_CLASE_1] FOREIGN KEY([tbl_curso_id])
REFERENCES [dbo].[tbl_curso] ([id])
GO
ALTER TABLE [dbo].[tbl_tema] CHECK CONSTRAINT [FK_TBL_CLASE_1]
GO
ALTER TABLE [dbo].[tbl_tema]  WITH CHECK ADD  CONSTRAINT [FK_TBL_CLASE_2] FOREIGN KEY([tbl_expositor_id])
REFERENCES [dbo].[tbl_expositor] ([id])
GO
ALTER TABLE [dbo].[tbl_tema] CHECK CONSTRAINT [FK_TBL_CLASE_2]
GO
ALTER TABLE [dbo].[tbl_testdetalle]  WITH CHECK ADD  CONSTRAINT [fk_tbl_testdetalle] FOREIGN KEY([tbl_curso_id])
REFERENCES [dbo].[tbl_curso] ([id])
GO
ALTER TABLE [dbo].[tbl_testdetalle] CHECK CONSTRAINT [fk_tbl_testdetalle]
GO
ALTER TABLE [dbo].[tbl_testdetalle_respuesta]  WITH CHECK ADD  CONSTRAINT [FK_TBL_TESTDETALLE_RESPUESTA_1] FOREIGN KEY([tbl_testdetalle_id])
REFERENCES [dbo].[tbl_testdetalle] ([id])
GO
ALTER TABLE [dbo].[tbl_testdetalle_respuesta] CHECK CONSTRAINT [FK_TBL_TESTDETALLE_RESPUESTA_1]
GO
ALTER TABLE [dbo].[tbl_usuario]  WITH CHECK ADD  CONSTRAINT [FK_TBL_USUARIO_1] FOREIGN KEY([tbl_perfil_id])
REFERENCES [dbo].[tbl_perfil] ([id])
GO
ALTER TABLE [dbo].[tbl_usuario] CHECK CONSTRAINT [FK_TBL_USUARIO_1]
GO
ALTER TABLE [dbo].[tbl_usuario]  WITH CHECK ADD  CONSTRAINT [FK_TBL_USUARIO_2] FOREIGN KEY([tbl_persona_id])
REFERENCES [dbo].[tbl_persona] ([id])
GO
ALTER TABLE [dbo].[tbl_usuario] CHECK CONSTRAINT [FK_TBL_USUARIO_2]
GO
ALTER TABLE [dbo].[tbl_usuario]  WITH CHECK ADD  CONSTRAINT [FK_TBL_USUARIO_3] FOREIGN KEY([tbl_nivel_id])
REFERENCES [dbo].[tbl_nivel] ([id])
GO
ALTER TABLE [dbo].[tbl_usuario] CHECK CONSTRAINT [FK_TBL_USUARIO_3]
GO
USE [master]
GO
ALTER DATABASE [ELEARNING] SET  READ_WRITE 
GO
